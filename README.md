# farm_map_google

A contrib module for [farmOS](https://farmos.org/) providing Google maps layers.

*Note: Some branches and tags include only the built module. See the [2.x branch][2.x branch] for the full source code.*

## Installation

Use Composer and Drush to install farm_map_google in farmOS 2.x;

```sh
composer require paul121/farm_map_google
drush en farm_map_google
```

*Available released versions can be viewed at https://packagist.org/packages/paul121/farm_map_google*

## Development

From the [2.x branch][2.x branch] of this repository:

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

Observe that Google maps layers are available in farmOS maps. e.g. http://localhost:8080/dashboard

### How do you push new versions?

From the [2.x branch][2.x branch] of this repository:

```sh
# Add/commit your changes
git add [...]
# Update NPM package version and commit
npm --no-git-tag-version version --force patch
git commit
# Tag the release with the unbuilt prefix
git tag unbuilt-v9000.0.1
# Push the 2.x branch and new tag
git push --atomic origin HEAD:2.x unbuilt-v9000.0.1
```

[2.x branch]: https://github.com/paul121/farm_map_google/tree/2.x
