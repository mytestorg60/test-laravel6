## Demo Laravel App for Deploy Now

# Setup steps
Setup the project with a Static M [![Deploy to IONOS](https://images.ionos.space/deploy-now-icons/deploy-to-ionos-btn.svg)](https://ionos.space/setup?repo=https://github.com/agaengel/laravel-test)

###  manual changes to get this demo working

1. provide these secrets in to send the email in the repos secrects: https://github.com/$user$/$repository$/settings/secrets/actions

|secret|explanation|example|
|------|-----------|-------|
|MAIL_HOST|smtp| smtp.ionos.de |
|MAIL_PORT|smtp port|587|
|MAIL_USERNAME|smtp user||
|MAIL_PASSWORD|smtp password||
|MAIL_ENCRYPTION|mail transport encryption|tls|
|MAIL_FROM_ADDRESS|sending email address||

2. change [workflow](.github/workflow/ionos-space.yml) from uses: ionos-deploy-now/deploy-to-ionos-action@v1 to uses: ionos-deploy-now/deploy-to-ionos-action@v1.1.0 to and commit this to a feature branch.

3. append **initial-build: false** to [workflow](.github/workflow/ionos-space.yml) to have the storage directory excluded to future deployments. 


## Workflow changes

### deployment excludes
When using agaengel/deploy-to-ionos-action@master you can exclude folders and files during deployment.

The action can use one of the following files:
* [initialdeploy.excludes](./initialdeploy.excludes)
* [deploy.excludes](./deploy.excludes)

The default is to use initeialdeploy.excludes but you can activate deploy.excludes with setting **initial-build: false** in the action ionos-deploy-now/deploy-to-ionos-action@v1.1.0

### running remote commands in the webspace
After the deployment you can run commands in the webspace

For example this project runs the following commands:
* php8.0 artisan migrate --force
* php8.0 artisan cache:clear
* php8.0 artisan config:clear
* php8.0 artisan route:clear
* php8.0 artisan view:clear
* php8.0 artisan config:cache
* php8.0 artisan route:cache
* php8.0 artisan view:cache

You can define the commands in the file [remote.commands](./remote.commands)
