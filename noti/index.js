const webPush = require('web-push');

const vapidPublicKey = 'BAWr4lD9LJUJUpTyt5AxtL-XwJ4wPU2dc3B26DAq-w6vaO-PZBSVpGULA-T_iAnVfjMPEja-3iP9eBsxygkUP9g';
const vapidPrivateKey = '-GSkNVYpPMh9o9CH1SDR9tYZ-u4iJMWaW8rF-gBSQv8';

const pushSubscription = {"endpoint":"https://fcm.googleapis.com/fcm/send/eN-f9DUxJl0:APA91bFEMS2Pc_pvba04CpYycwIMKOKaf4EKHj6zUytXkl8stRarYUEtRsEaAAA6vAFZLHoxYOltXtfPDEXWxdveersoETvNX2LxfgJ0HG4G4bhnHVdZJ_Y6QWknFHOHJtNgrgkLZyxk","expirationTime":null,"keys":{"p256dh":"BC8Xqgct9dnTJWwExY__3RbVVYvcdxWMtg5sJ86IFOi94aYN6hZ9K0V2f0Y45DZpmahLoKrRNYm3qyjJ2FpTAK0","auth":"dL-HulgcBn_13NqHXjVJtw"}};

const payload = 'Here is a payload!';

const options = {
  TTL: 60,

  vapidDetails: {
    subject: 'mailto: tobyharvie@gmail.oom',
    publicKey: vapidPublicKey,
    privateKey: vapidPrivateKey
  }

};

webPush.sendNotification(
  pushSubscription,
  payload,
  options
);
