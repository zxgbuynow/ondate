import axios from 'axios'
axios.defaults.timeout = 7000;

const getRoomList = (params) => {

	//测试代码↓↓↓↓↓↓↓↓
	var storeyNo = params.storeyNo;
	var result;
	switch(storeyNo) {
		case 0:
			result = axios.get('http://localhost:8081/static/roomList0.json')
			break;
		case 1:	
			result = axios.get('http://localhost:8081/static/roomList1.json')		
			break;
		case 2:
			result = axios.get('http://localhost:8081/static/roomList2.json')
			break;	
		case 3:
			result = axios.get('http://localhost:8081/static/roomList3.json') 
			break;
		case 4:
			result = axios.get('http://localhost:8081/static/roomList4.json')
			break;
		default:
			break;		
	}
	return result;
	//测试代码↑↑↑↑↑↑↑↑
	//请求房间列表API
	// return axios.get('apiurl', { params: params })
}
//homeIndex
const homeIndex = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}

//queue
const homeQueue = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//waitList
const waitList = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//waitList
const roomList = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//goodslist
const goodslist = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//queueList
const queueList = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//orderList
const orderList = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//artList
const artList = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//artStatement
const artStatement = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//orderFinsh
const orderFinsh = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//orderRefund
const orderRefund = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//orderExRoom
const orderExRoom = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//waitAdd
const waitAdd = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//waitDel
const waitDel = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//waitEdit
const waitEdit = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//queueLogout
const queueLogout = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//queueCall
const queueCall = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//queueOrder
const queueOrder = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}
//makeArt
const makeArt = (params) => {
	return axios.get('http://47.111.119.90/index.php/home/Api', {
		params
	})
}

export default {
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