# Mark Marino's Project 3: Developer's Best Friend

## Live URL
<http://p3.markmarinorocks.me/>

## Description
Developer's Best Friend is a Laravel-based web app comprised of two useful utilities for developers: a random user generator, and a lorem ipsum dummy text generator. Most of the heavy lifting is done via [Francois Zaninotto's Faker PHP package](https://github.com/fzaninotto/Faker). The front-end look and feel is using the Bootstrap framework.

## Demo
http://screencast.com/t/RhqyyWT39t

## Details for teaching team
It was of great help to have Susan's Shipper app demo as a bird's eye view of the entire process. It helped me conceptualize how to pull the app together as well as ironing out a lot of the nuts and bolts of implementing this app using Laravel and the MVC model. I'm sure I would have been floundering much more if it had not been for that.

[Susan Buck's Shipper app demo video](https://docs.google.com/document/d/1GaJBiPdqaUYhtd2BKze4MJgL1Yn2nIG-HraHZRsmShA/edit)

I did not stray much from the project's requirement on this. I wanted to implement custom error messages for the server-side validation, so I spent some time researching how to do that in the controller. Some of the validation code would only be triggered if someone tried to spoof the form POST data.

I choose to stick with one package (Faker) for this project because, well, it did everything required, both Lorem Ipsum generation and random user generation.

To pretty things up, I incorporated Bootstrap and a few custom CSS settings. This allowed me to get the sticky footer, breadcrumbs, and page/form layout to look the way I wanted.

A big thanks to Rebekah Heacock Jones for her help with getting my validation code working and for helping me figure out how to get the form to display the values after the submit whether they were valid or not... the devil is in the details.

## Outside code
* Francois Zaninotto's Faker PHP package https://github.com/fzaninotto/Faker
* Bootstrap: http://getbootstrap.com/
