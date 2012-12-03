 Score Web Service for Game
====================

RESTFull Web Service for collect score from game on any platform, developer can register thier game/app via REST APIs and usr appkey to push the score.
Service provide leaderboard, use REST push appkey to get leaderboard score for game/app.

Services
-------------

Service | Method | URI | Data | Retrun
------------ | ------------- | -------------  | ------------- | -------------
SignUp  |  POST | /score/user/signup.json | email, password | pubkey
SignIn | POST | /score/user/signin.json | email, password | sesskey
Register App | POST | /score/application/register.json | name, package, sesskey, pubkey | appkey
Post Score | POST | /score/score/post.json | name, score, appkey | data
Leader Board | POST | /score/score/leaderboard.json | appkey, number | data

Tools
----------------

[CakePHP](http://www.cakephp.org) - The rapid development PHP framework 
