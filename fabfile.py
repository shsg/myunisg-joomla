from __future__ import with_statement
import os
from fabric.api import local, cd # abort, run, settings

WORKSPACE_PATH = os.path.abspath(os.path.dirname(__file__))

def create_test_environment():
    cleanup_test_environment()
    local('mkdir test-webroot')                                                     # create test-webroot folder
    local('unzip installs/Joomla_2.5.7-Stable-Full_Package.zip -d ./test-webroot/') # unzip the latest (in the repo) available Joomla there
    # copy our modules, components, templates, plugins
    # create fresh database and insert clean dump (modules registered, test-users created)
    # echo testusers (admin, verein)

def setup_phpmyadmin():
    teardown_phpmyadmin()
    local('mkdir phpmyadmin-webroot')                                                   # create test-webroot folder
    local('unzip installs/phpMyAdmin-3.5.4-all-languages.zip -d ./phpmyadmin-webroot/') # unzip the latest (in the repo) available Joomla there
    with cd('./phpmyadmin-webroot'):
        # local('open localhost:8001')
        local('php -S localhost:8001')

def teardown_phpmyadmin():
    local('rm -rf ./phpmyadmin-webroot')


def start_dev_servers():
    # test if php version >= 5.4
    # start local php-server
    local('php -S localhost:8000')
    # start local mysql-server

def cleanup_test_environment():
    local('rm -rf ./test-webroot')


# def push():
#     code_dir = '/Users/dominik/Projects/shsg/'
#     local("pwd")
#     with cd(code_dir):
#         local("echo 'PUSH'")
#         local("pwd")



