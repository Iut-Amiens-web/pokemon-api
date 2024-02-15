<h1 align="center">LVMH docker 🧙</h1>
<p align="center">
  <a>
    <img alt="Docker" src="https://img.shields.io/badge/Docker-2CA5E0?style=for-the-badge&logo=docker&logoColor=white" />
  </a>
  <a>
    <img alt="Composer" src="https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=Composer&logoColor=white" />
  </a>
  <a>
    <img alt="Mysql" src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" />
  </a>
  <a>
    <img alt="Php" src="https://img.shields.io/badge/PHP-8.1.2-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  </a>
  <a>
    <img alt="Symfony" src="https://img.shields.io/badge/Symfony-5.4.*-777BB4?style=for-the-badge&logo=Symfony&logoColor=white" />
  </a>
</p>

> **Ce boilerplate docker permet de creer un projet API ou WebApp**

- - - -
## **Requirements** ##
- [Git](https://git-scm.com/downloads).
- [Make](https://www.gnu.org/software/make/).
- Docker and Docker Compose:
	- [For linux](https://docs.docker.com/get-docker/).
	- [For mac](https://docs.docker.com/docker-for-mac/install/).
	- [For windows](https://docs.docker.com/docker-for-windows/install/).
- [Python 3](https://www.python.org/downloads/release/python-360/).
- [python3-venv](https://docs.python.org/3/library/venv.html) package.

## **Setup** ##

1. **Clone this repository and move into it :**
>If it is not already done, [generate and add your SSH key to your Gitlab
account](https://docs.gitlab.com/ee/user/ssh.html#add-an-ssh-key-to-your-gitlab-account).
```bash

```

2. **Create a .env.local file and set all needed variables :**
	1.   Copy the ".env" file to a new ".env.local" file : `cp .env .env.local`
	2.   Obtain from your referent team leader the Amazon Web Services
  `AWS_MAIN_BUCKET`, `AWS_KEY` and `AWS_SECRET` variables values and fill the
  .env.local file with them:

```
DATABASE_URL=mysql://root:root@database:3306/docker-api?serverVersion=8.0

AWS_MAIN_BUCKET=
AWS_KEY=
AWS_SECRET=
```
>Mandatory : .env.local or environment should have s3 credentials

4. **Create a virtual environment and install the python dependencies :**
```bash
python3 -m venv venv
venv/bin/python -m pip install -r requirements.txt
```

3. **Install the project :**
```bash
make pj-install
```

## **Usage** ##
- **Start :**

Launch the containers and the API server.
```sh
make pj-start
```
- **Stop :**

Stop the containers and the API server.
```sh
make pj-stop
```
- **Restart :**

Restart the containers and the API server.
```sh
make pj-restart
```
- **Update :**

Update the local project dependencies.
```sh
make pj-update
```
- **Reset :**

Stop the containers, drop the database and reinstall the project.
```sh
make pj-reset
``````

## **Interfaces** ##

1. **App.**
>Access to [App](https://api-platform.com/docs/) on [127.0.0.1:8000](http://127.0.0.1:8000).

2. **PHPmyadmin.**
>Access to [PHPmyadmin](https://docs.phpmyadmin.net/en/latest/index.html) on [127.0.0.1:8080](http://pma.localhost).

4. **Maildev.**
>Access to [MailDev](https://www.npmjs.com/package/maildev) on [127.0.0.1:8081](http://127.0.0.1:8081).

## External ressources ##

- **Framework :** [Symfony](https://symfony.com/doc/5.4/index.html)
- **ORM :** [Doctrine](https://symfony.com/doc/5.4/doctrine.html#creating-the-database-tables-schema)
- **Fixtures :**
	- [Alice Bundle](https://github.com/theofidry/AliceBundle) (just for the affiliation).
	- [Zenstruck Foundry Bundle](https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html) (for the rest of the application)


## Project information

> Make sf lexik:jwt:generate-keypair
