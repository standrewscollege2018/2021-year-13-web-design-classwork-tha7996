const webPush = require('web-push');

// const vapidPublicKey = 'BBKJ5esc7mHqXQB4Pif02rPjDu7NJnWkIqC8qaS7yeJ0N2ss5TN2Tk-qb69Sv8AUWUkTP5J19yLEzRE3aUT-HE0';
// const vapidPrivateKey = 'DfCK02KeN6vBK_HcTc3r2-1b0xgm91xfiWQareSCiTs';
const vapidPublicKey = 'BDD_zKtxaL_P25T2C7AjeenIND2VabW2qBn6tsHyib3-ICZLZ1ovxh5ID1Ilh-EvDw9Fz-sNiJcp37SpCqVKahQ';
const vapidPrivateKey = '0IqLNVKDgPSNz8sHL9eDGQguPnYqolZzIEJCyX2xUJY';

// subscription object
const pushSubscription = {"endpoint":"https://updates.push.services.mozilla.com/wpush/v2/gAAAAABg_LwUfDksHLXutJKzOaNTuwmiBhNiHvhACIc1nY6GASDi2v7M5YTCtZB2hSYCf1tXaJzx_LdDgSthqwj7hzE9CcqQrdUgHMLzFERtC0JzlzcQYDuSPJtXpT9YcR4pQeAVK8edzLcNNUJVq2Ksq3oRvJwq5F9GvSbpEGMOVYv_CLgS5Y0","keys":{"auth":"QDyZ08eMaAWsnrYaQ1og7A","p256dh":"BPYmDHq2CiaUpK-Cdf67P9AscYMekJnf_QVtoXLD-NN2H9vBe4HIfrnY0mHSZXuz9wmNjozitIogcE3WkkTN0AA"}}

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
