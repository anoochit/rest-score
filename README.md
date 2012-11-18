 Score Web Service for Game
====================

RESTFull Web Service for collect score from game on any platform, developer can register thier game/app via REST APIs and usr appkey to push the score.
Service provide leaderboard, use REST push appkey to get leaderboard score for game/app.

Services
-------------

Service | Method | URI | Data 
------------ | ------------- | -------------  | -------------
SignUp  |  POST | /score/user/signup.json | email, password return pubkey
SignIn | POST | /score/user/signin.json | email, password return sesskey
Register App | POST | /score/application/register.json | appname, package, sesskey return appkey
Post Score | POST | /score/score/post.json | name, score, appkey return code
Leader Board | POST | /score/leaderboard.json | appkey, number return data

Tools
----------------

[CakePHP](http://www.cakephp.org) - The rapid development PHP framework 
