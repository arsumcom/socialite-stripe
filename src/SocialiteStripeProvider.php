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
    'read_only',
    'read_write'
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
          'Authorization' => 'Bearer ' . $token,
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
      'name' => array_get($user, 'display_name'),
      'email' => array_get($user, 'email')
    ]);
  }
}

