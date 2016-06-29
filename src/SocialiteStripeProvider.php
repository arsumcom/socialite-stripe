<?php

namespace ArsumCom\SocialiteStripe;

use Laravel\Socialite\Two\User;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;

class SocialiteStripeProvider extends AbstractProvider implements ProviderInterface
{
    const URL = 'https://connect.stripe.com';

    /**
     * The separating character for the requested scopes.
     *
     * @var string
     */
    protected $scopeSeparator = ' ';

    /**
     * The scopes being requested.
     *
     * @var array
     */
    protected $scopes = [
      'read_only'
    ];

    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase(self::URL . '/oauth/authorize', $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return self::URL . '/oauth/token';
    }

    /**
     * Get the access token for the given code.
     *
     * @param  string $code
     * @return string
     */
//  public function getAccessToken($code)
//  {
//    $url = $this->getTokenUrl();
//    $data = $this->getTokenFields($code);
//
//    $ch = curl_init($url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_POST, true);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
//
//    $response = curl_exec($ch);
//
//    curl_close($ch);
//
//
//    //return $this->parseAccessToken($response->getBody());
//  }

    /**
     * Get the POST fields for the token request.
     *
     * @param  string $code
     * @return array
     */
    protected function getTokenFields($code)
    {
        $fields = [
          'grant_type' => 'authorization_code'
        ];

        $fields += parent::getTokenFields($code);

        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get(
          self::URL . '/v1/account', [
            'headers' => [
              'Authorization' => 'Bearer '. $token,
            ],
          ]
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
          'id' => array_get($user, 'id'),
          'provider' => 'stripe',
          'name' => array_get($user, 'display_name'),
          'email' => array_get($user, 'email')
        ]);
    }
}

