 Score Service for Game
====================

Services
-------------

Service | Method | URI | Data 
------------ | ------------- | -------------
SignUp | POST | /score/user/signup | email, password return pubkey
SignIn | POST | /score/user/signin | email, password return sesskey
Register App | POST | /score/application/register | appname, package, sesskey return appkey
Post Score | POST | /score/score/post | name, score, appkey return code
Leader Board | GET | /score/leaderboard | appkey, number return data

Tools
----------------

[CakePHP](http://www.cakephp.org) - The rapid development PHP framework 
