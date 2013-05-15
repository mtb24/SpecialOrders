    
/* Begin updating new orders number upon Admin login. Updates every 5 min. Stops when Admin logs out */

  getNewOrderNum_ID = setInterval(getNewOrderNum, 300000);