#Contributing to the Dropbox v2 PHP SDK

##Workflow
 - Fork the project
 - Make your changes. The **master** branch always contains the latest copy of stable code.
 - **Write tests for your code**. Pull requests will be rejected if they do not have tests. 100% coverage is normally required - if you are unable to achieve this (e.g. API permission errors as seen with https://api.dropboxapi.com/2/files/permanently_delete) you must state the reasons. Be sure to read the [testing guide](https://github.com/Alorel/dropbox-v2-php/tree/master/tests#readme) - you'll need your own API key.
 - Make a pull request into the **pull-staging** branch

##Code guidelines
 - All code must comply with [PSR standards](http://www.php-fig.org/).
 - Ideally, there should be no additional Composer requirements. You must state the reasoning behind new requirements if they are added.
 - Do not have your IDE reformat any files you aren't working on
 - Your code must **not** break compatibility with the versions listed in [.travis.yml](https://github.com/Alorel/dropbox-v2-php/blob/master/.travis.yml).
 - PHPDoc comments are required. **Your pull request will be rejected if the code is not documented**.
	 - Whilst on the topic, make sure to add `@author` PHPDoc tags to your code so people can contact you personally regarding your code.  
 - Use [generators](https://secure.php.net/manual/en/language.generators.syntax.php) instead of arrays whenever possible - keep that memory footprint as low as possible!