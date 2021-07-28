const webPush = require('web-push');

// const vapidPublicKey = 'BBKJ5esc7mHqXQB4Pif02rPjDu7NJnWkIqC8qaS7yeJ0N2ss5TN2Tk-qb69Sv8AUWUkTP5J19yLEzRE3aUT-HE0';
// const vapidPrivateKey = 'DfCK02KeN6vBK_HcTc3r2-1b0xgm91xfiWQareSCiTs';
const vapidPublicKey = 'BDD_zKtxaL_P25T2C7AjeenIND2VabW2qBn6tsHyib3-ICZLZ1ovxh5ID1Ilh-EvDw9Fz-sNiJcp37SpCqVKahQ';
const vapidPrivateKey = '0IqLNVKDgPSNz8sHL9eDGQguPnYqolZzIEJCyX2xUJY';

// subscription object
const pushSubscription = {"endpoint":"https://fcm.googleapis.com/fcm/send/egg0epfYTL0:APA91bGvNezIYJsuJIzkyeyHSKL33z3ixHKgFcOlF6lCooe0nvIULk-HCGZXwvVC5UUTDE6qkY9SS6jJ_bWi3Dbczn0QeOX9FMiMWiK-XdtgRqUfVxW9sohU_4rZ7HmY9w_0QN1acThY","expirationTime":null,"keys":{"p256dh":"BBihHvkpwVGtU6abPaBwBY-NfU8CmaRTi5ZS7yBvX0gpxvodmeM3r2EDS4CiM9Nn3qQWZVcwsnd4wNjf4UqcbkI","auth":"LkJDbfOgN6vRoZ-rs3T6lA"}}

const payload = 'Here is a payload!';

const options = {
  TTL: 60,

  vapidDetails: {
    subject: 'mailto: tobyharvie@gmail.oom',
    publicKey: vapidPublicKey,
    privateKey: vapidPrivateKey
  }

};

// send push notifications
webPush.sendNotification(
  pushSubscription,
  payload,
  options
);
