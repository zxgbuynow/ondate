import { default as server} from '../server/server.js'

//获取房间列表
const getRoomList = (params) => {	
  return new Promise(function (resolve, reject) {
    server.getRoomList(params).then(function(data){   
      var data = data.data;   
      if(data.code === 'N0000'){
      // console.log(data.data)
        resolve(data);
      }else{
        reject(rdata);
      }
    });
  });
}
const homeIndex = (params) => { 
  return new Promise(function (resolve, reject) {
    server.homeQueue(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const homeQueue = (params) => { 
  return new Promise(function (resolve, reject) {
    server.homeQueue(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const waitList = (params) => { 
  return new Promise(function (resolve, reject) {
    server.waitList(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const roomList = (params) => { 
  return new Promise(function (resolve, reject) {
    server.roomList(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const goodslist = (params) => { 
  return new Promise(function (resolve, reject) {
    server.goodslist(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const queueList = (params) => { 
  return new Promise(function (resolve, reject) {
    server.queueList(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}

const orderList = (params) => { 
  return new Promise(function (resolve, reject) {
    server.orderList(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}

const artList = (params) => { 
  return new Promise(function (resolve, reject) {
    server.artList(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const artStatement = (params) => { 
  return new Promise(function (resolve, reject) {
    server.artStatement(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const orderExRoom = (params) => { 
  return new Promise(function (resolve, reject) {
    server.orderExRoom(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const orderRefund = (params) => { 
  return new Promise(function (resolve, reject) {
    server.orderRefund(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const orderFinsh = (params) => { 
  return new Promise(function (resolve, reject) {
    server.orderFinsh(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const waitAdd = (params) => { 
  return new Promise(function (resolve, reject) {
    server.waitAdd(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const waitDel = (params) => { 
  return new Promise(function (resolve, reject) {
    server.waitDel(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const waitEdit = (params) => { 
  return new Promise(function (resolve, reject) {
    server.waitEdit(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const queueLogout = (params) => { 
  return new Promise(function (resolve, reject) {
    server.queueLogout(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const queueCall = (params) => { 
  return new Promise(function (resolve, reject) {
    server.queueCall(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const queueOrder = (params) => { 
  return new Promise(function (resolve, reject) {
    server.queueOrder(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}
const makeArt = (params) => { 
  return new Promise(function (resolve, reject) {
    server.makeArt(params).then(function(data){
      var rdata = data.data
      if(rdata.status == '1'){
        resolve(rdata);
      }else{
        reject(rdata);
      }
    });
  });
}

export {
  homeIndex,
  getRoomList,
  homeQueue,
  waitList,
  roomList,
  goodslist,
  queueList,
  orderList,
  artList,
  artStatement,
  orderFinsh,
  orderRefund,
  orderExRoom,
  waitAdd,
  waitDel,
  waitEdit,
  queueLogout,
  queueCall,
  queueOrder,
  makeArt
}