<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

	const USER = 'd969831eb8a99cff8c02e681f43289e5d3d69664';
	const PASSWORD = 'd088e6f5dcad86e8723dc828cb7fe54ae0a9330a';

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		if (sha1($this->username) != self::USER)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if (sha1($this->password) != self::PASSWORD)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->setState('id', '07');
			$this->setState('username', $this->username);
			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
	}

}