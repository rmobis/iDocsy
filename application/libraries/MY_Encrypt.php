<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Encrypt extends CI_Encrypt {

	/**
	 * Generates a bcrypt compatible salt
	 * @param  {integer}	$rounds	Hash strength
	 * @return {string}				Salt
	 */
	private function genSalt($rounds) {
		return sprintf('$2y$%02d$%s',
			$rounds,
			substr(base64_encode(openssl_random_pseudo_bytes(16)), 0, 16)
		);
	}

	/**
	 * Hashes given input
	 * @param  {string}		$input	String to be hashed
	 * @param  {integer}	$rounds	Hash strength
	 * @return {string}				Hash
	 */
	public function bcrypt_hash($input, $rounds = 24) {
		return crypt($input, $this->genSalt($rounds));
	}

	/**
	 * Checks if given input matches to hash
	 * @param  {string}		$input	Input to be checked
	 * @param  {string}		$hash	Hashed value
	 * @return {boolean}			Whether they match
	 */
	public function bcrypt_check($input, $hash) {
		return $hash === crypt($input, $hash);
	}
}

/* End of file MY_Encrypt.php */
/* Location: ./application/libraries/MY_Encrypt.php */