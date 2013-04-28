# Magento PushOver

Send push notifications to iOS and Android through PushOver.net with Magento

# Usage

1\. Install the extension in your Magento setup

* Copy app/code/core/community/Nls
* Copy app/etc/modules/Nls_Pushover.xml

2\. Go to [PushOver](http://pushover.net) and create an account

3\. Create a new application :

![create_app](http://static.nls.io/pushover/create_app.jpg)

4\. Get the App token :

![token](http://static.nls.io/pushover/token.jpg)

5\. Get the user key :

![userkey](http://static.nls.io/pushover/userkey.jpg)

6\. Configure the Magento module with the PushOver token and the key :

![module_config](http://static.nls.io/pushover/module_config.jpg)

7\. Setup PushOver on your phone :

![pushover](http://static.nls.io/pushover/pushover.jpg)

8\. Make a test order on your Magento Store. You should now receive a real-time push notifications with order details :

![push](http://static.nls.io/pushover/push.jpg)

# TODO :

* Handle multiple PushOver users
* Observe new events - to be determined.
* Send daily summary