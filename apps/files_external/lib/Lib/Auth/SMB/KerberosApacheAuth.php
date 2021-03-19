<?php
// /opt/rh/httpd24/root/var/www/html/nextcloud/apps/files_external/lib/Lib/Auth/SMB
/**
 * @copyright Copyright (c) 2018 Robin Appelman <robin@icewind.nl>
 *
 * @author Robin Appelman <robin@icewind.nl>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Files_External\Lib\Auth\SMB;

use OCA\Files_External\Lib\Auth\AuthMechanism;
use OCP\IL10N;
use OCP\Authentication\LoginCredentials\IStore as CredentialsStore;

class KerberosApacheAuth extends AuthMechanism {
        private $credentialsStore;

	public function __construct(IL10N $l, CredentialsStore $credentialsStore) {
		$this
			->setIdentifier('smb::kerberosapache')
			->setScheme(self::SCHEME_SMB)
			->setText($l->t('Kerberos ticket apache mode'));
                $this->credentialsStore = $credentialsStore;
	}
       
        public function getCredentialsStore() {
            return $this->credentialsStore;
        }

/*
       public function manipulateStorageConfig(StorageConfig &$storage, IUser $user = null) {
		try {
			$credentials = $this->credentialsStore->getLoginCredentials();
		} catch (CredentialsUnavailableException $e) {
			throw new InsufficientDataForMeaningfulAnswerException('No session credentials saved');
		}

		$storage->setBackendOption('user', $credentials->getLoginName());
		$storage->setBackendOption('password', $credentials->getPassword());
      }
*/
}
