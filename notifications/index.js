const webpush = require('webPush');

function generateVAPIDKeys() {
  const vapidKeys = webpush.generateVAPIDKeys();

  return {
    publicKey: vapidKeys.publicKey,
    privateKey: vapidKeys.privateKey,
  };
}



keys=generateVAPIDKeys();

console.log('fsd');
