const webPush = require('web-push');
const fetch = require('node-fetch');

// const vapidPublicKey = 'BBKJ5esc7mHqXQB4Pif02rPjDu7NJnWkIqC8qaS7yeJ0N2ss5TN2Tk-qb69Sv8AUWUkTP5J19yLEzRE3aUT-HE0';
// const vapidPrivateKey = 'DfCK02KeN6vBK_HcTc3r2-1b0xgm91xfiWQareSCiTs';
const vapidPublicKey = 'BDD_zKtxaL_P25T2C7AjeenIND2VabW2qBn6tsHyib3-ICZLZ1ovxh5ID1Ilh-EvDw9Fz-sNiJcp37SpCqVKahQ';
const vapidPrivateKey = '0IqLNVKDgPSNz8sHL9eDGQguPnYqolZzIEJCyX2xUJY';

const payload = 'Here is a payload!';

var pushSubscriptions;


const options = {
  TTL: 60,

  vapidDetails: {
    subject: 'mailto: tobyharvie@gmail.oom',
    publicKey: vapidPublicKey,
    privateKey: vapidPrivateKey
  }

};


fetch('http://localhost/2021-year-13-web-design-classwork-tha7996/admin-push/getusers.php')
  .then((response) => response.json())
  .then(data => sendEachNotifcation(data))
  // .then(() => console.log(pushSubscriptions))

function sendEachNotifcation(pushSubscriptions){
  console.log(pushSubscriptions);
  for(var i = 0; i < pushSubscriptions.length; i++) {
    var pushSubscription = pushSubscriptions[i][0];

    console.log(pushSubscription);

    webPush.sendNotification(
      pushSubscriptions[i][0],
      payload,
      options
    );
  }

}


// for (var pushSubscription of pushSubscriptions)
// {
//   webPush.sendNotification(
//     pushSubscription,
//     payload,
//     options
//   );
// }
