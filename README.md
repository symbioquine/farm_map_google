# farm_map_google

A contrib module for [farmOS](https://farmos.org/) providing Google maps layers.

![image](https://github.com/symbioquine/farm_map_google/assets/30754460/a5148f18-ef7c-4745-9627-50082f34c6e3)

*Note: Some branches and tags include only the built module. See the [2.x-development branch][2.x-development branch] for the full source code.*

*Licensing Note: The Javascript source code in this repository is MIT licensed, but the yaml and php source is GPLv3 licensed as some derives from the Drupal examples.*

## Installation

Use Composer and Drush to install farm_map_google in farmOS 3.x;

```sh
composer require drupal/farm_map_google
drush en farm_map_google
```

*Available released versions can be viewed at https://www.drupal.org/project/farm_map_google*

Set a Google maps API key by clicking on "Setup" >> "Settings" in the left navigation bar then going to the "Map" and "Google" tabs;

![image](https://github.com/symbioquine/farm_map_google/assets/30754460/c3c45662-7ad7-431f-a032-827fa4fa1eaa)

## Development

From the [2.x-development branch][2.x-development branch] of this repository:

**Start/recreate the farmOS container;**

```sh
cd docker/
./destroy_and_recreate_containers.sh
```

**Run the dev proxy server;**

```sh
npm install
npm run dev
```

Observe that Google maps layers are available in farmOS maps. e.g. [http://localhost:8080/dashboard](http://localhost:8080/dashboard) - login: `admin`:`admin`.

### How do you push new versions?

From the [2.x-development branch][2.x-development branch] of this repository:

```sh
# Add/commit your changes
git add [...]
# Update NPM package version and commit
npm --no-git-tag-version version --force patch
git commit
# Tag the release with the unbuilt prefix
git tag unbuilt-v9000.0.1
# Push the 2.x-development branch and new unbuilt tag
git push --atomic origin HEAD:2.x-development unbuilt-v9000.0.1
```

[2.x-development branch]: https://github.com/symbioquine/farm_map_google/tree/2.x-development
