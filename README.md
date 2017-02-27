# Pipeline 

In simple words, Pipelines is a Web hooks manager. Use it with platforms like Mailchimp, Github, Mailgun to receive Web Hook post data.



## Why did I create Pipelines?

Starting a new company, I decided to out-source a lot of the tasks like Performance Management, Servers, and so on. One of the biggest issue with these services were the emails. Initially I tried finding a service where I would be able to receive webhooks too! However, after not finding one (and realizing how much of a security issue it may be) I decided to create my own.

Pipelines is a centralized dashboard where you can receive web hooks from multiple platforms.


--
#### Terms to know:

- End Points
--	End points are links that receive POST data. All end points are received by calls.php
- Incidents
-- An Incident is how we present data received by a POST to you.
- Web Hooks
-- Google it.
- Auth Keys
-- Auth Keys are used for verification so that you wont be receiving false post data. Hopefully no one will find you End Points.



## How does it work?

Pipelines consists of two main parts:

- The Dashboard
- The End Points

The Dashboard is where you can view all your Incidents. You can create End Points or manage who gets to see incidents (yes. we support multiple users!!!!)

The End Points is basically a link where you will receive POST data. You can generate unique links for each service.



## What services do you support?

Initially, we support the following services:

- [Mailgun](http://mailgun.org)
- [Mailchimp](http://www.mailchimp.com)
- [Customer.io](http://www.customer.io)

We are consistantly working on new features



## Is Pipelines Stable?

I would say not. We are constantly working on making sure Pipelines is ready for prime time.


## How do I install Pipelines?

Currently, Pipelines needs to be installed manually. We hope to build an installer for it soon. You can install Pipelines locally by following the steps below: (we will assume you're using MAMP)


#### Step 1: Download Pipelines

Clone or [Download Pipelines](https://github.com/uziiuzair/Pipeline/archive/master.zip) by clicking the link above.


#### Step 2: Set up the local folder and Unzip

Go to your *htdocs* folder. You can find it at /Applications/MAMP/htdocs on a Mac.
Create a folder called Pipelines. and Unzip master.zip into the newly created folder.


#### Step 3: Create MySQL Database and Import SQL

Head over to http://localhost:8888/phpmyadmin and create a new Database called pipelines.

Click the pipelines link in your PHPMyAdmin and Import the db.sql file in the master.zip file (you can import the SQL by clicking IMPORT on top of the PHPMyAdmin page.


#### Step 4: Setting Configs!

Head over to include/configs.php
Change the values of $database_host, $database_user, $database_pass, $database_db to match your own MySQL Database values.


#### Step 5: You're almost done.

You can now check out your new site at http://localhost:8888/pipelines ! 

Username: admin

Password: admin

--


Head over to the Wiki to find out more!!!
