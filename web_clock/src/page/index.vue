<template>
	<div class="layout">
		<Layout class="content">
			<Header class="index-header">
				<div class="header-btn btn-reload" @click="reload()">刷新</div>
				<div class="header-btn btn-vip" @click="modal_vipwait=true">贵宾等待</div>
				<div class="header-btn btn-artificer" @click="modal_artificerStatus=true">技师状况</div>
				<div class="header-btn btn-appointment">客户预约</div>
				<div class="header-btn btn-goback" @click="pageBack()">返回</div>
			</Header>
			<Layout class="index-content">
				<Sider hide-trigger class="content-storeys" width=60 >
					<div v-for="(cate,index) in homeIndexs">
					<div class="content-storey" v-bind:class="{active:storeyNo==cate.id}" @click='changeStorey(cate.id)'>
						<div class="content-storey-border"></div>
						<div class="content-storey-text">{{cate.cate_name}}</div>
					</div>
					</div>
				</Sider>
				<Content class="content-rooms">
					<div class="content-room" v-for="(room,index) in roomList">
						<!-- 房间号 -->
						<div class="room-title">
							<div class="room-title-text">{{room.room_name}}</div>
							<div class="room-title-btn" @mouseover="roomShowOrder(room.id)" @mouseout="roomShowOrder('-1')"></div>
						</div>
						<div class="room-order" v-bind:class="{active:roomIdToShowOrder==room.id}" @mouseover="roomShowOrder(room.id)" @mouseout="roomShowOrder('-1')">
							<div class="order-item" @click="makeRoomArt(room.id,room.room_name)">安排技师</div>
							<div class="order-item" @click="showRoomInfo(room.id,room.room_name)">详细信息</div>
							<div class="order-item">刷新房间</div>
							<div class="order-item">预约</div>
						</div>
						<!-- 空闲 -->
						<div class="room-content spare" v-bind:class="{active:room.status=='0'}">
							<div class="spare-text1">空闲</div>
							<div class="spare-text2">{{room.seats}}座</div>
						</div>
						<!-- 清洁中 -->
						<div class="room-content cleaning" v-bind:class="{active:room.status=='3'}"></div>
						<!-- 工作中 -->
						<div class="room-content working " v-bind:class="{active:room.status=='4'}">
							<div class="working-info info-name">{{room.calls.name}}</div>
							<div class="working-info info-tel">{{room.calls.tel}}</div>
							<div class="working-info info-count">{{room.calls.total}}位</div>
							<div class="working-info info-time">{{room.time}}</div>
						</div>
						<!-- 结账？？？ -->
						<div class="room-content settlement" v-bind:class="{active:room.status=='2'}">
							<div class="settlement-info-custom" v-for="(rooml,index) in room.calls">
								<div class="custom-location">{{rooml.time}}</div>
								<div class="custom-count">{{rooml.sex}}：{{rooml.num}}</div>
							</div>

							<div class="settlement-info-fee">消费：{{room.fee}}元</div>
						</div>
					</div>
				</Content>
			</Layout>
			<Footer class="index-footer">
				<div class="footer-artificers">
					<div class="artificer-type type-foot">{{spaArtificer.tcount}}</div>
					<div class="artificer-items">
						<div class="artificer-item" v-bind:class="{free:artificer.type=='0',onclock:artificer.type=='1',inline:artificer.type=='2',logoff:artificer.type=='3'}" v-for="(artificer,index) in spaArtificer.list">
							<div class="artificer-gender" v-bind:class="{male:artificer.gender=='男',female:artificer.gender=='女'}"></div>
							<div class="artificer-number">{{artificer.number}}</div>
							<div class="artificer-status">{{artificer.statusDesc}}</div>
						</div>
					</div>
				</div>
				<div class="footer-artificers">
					<div class="artificer-type type-spa">{{footArtificer.tcount}}</div>
					<div class="artificer-items">
						<div class="artificer-item" v-bind:class="{free:artificer.type=='0',onclock:artificer.type=='1',inline:artificer.type=='2',logoff:artificer.type=='3'}" v-for="(artificer,index) in footArtificer.list" >
							<div class="artificer-gender" v-bind:class="{male:artificer.gender=='男',female:artificer.gender=='女'}"></div>
							<div class="artificer-number">{{artificer.number}}</div>
							<div class="artificer-status">{{artificer.statusDesc}}</div>
						</div>
					</div>
				</div>
			</Footer>
		</Layout>

		<!-- 对话框 安排技师-->
		<Modal v-model="modal_arrange" class-name="vertical-center-modal modal-arrange-modal">			
			<div slot="header" class="modal-header modal-arrange-header">
				<div class="arrange-title">{{currenRoom}}房间技师安排</div>
				<div class="arrange-type">
					<div class="type-item type-person" v-bind:class="{active:arrangeChangeType=='persionChange'}" @click="changeArrangeType('persionChange')">主动选择</div>
					<div class="type-item type-system" v-bind:class="{active:arrangeChangeType=='systemChange'}" @click="changeArrangeType('systemChange')">系统选择</div>
				</div>
			</div>
			<div class="arrange-info">
				女技师数&nbsp;&nbsp;&nbsp;&nbsp; <Input v-bind:disabled="arrangeChangeType=='persionChange'" v-model="arrangeAdd.woman"  style="width: auto" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				男技师数&nbsp;&nbsp;&nbsp;&nbsp; <Input v-bind:disabled="arrangeChangeType=='persionChange'" v-model="arrangeAdd.man"  style="width: auto" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				不限性别&nbsp;&nbsp;&nbsp;&nbsp; <Input v-bind:disabled="arrangeChangeType=='persionChange'" v-model="arrangeAdd.secret" style="width: auto" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
			<div class="arrange-info">
				选择技师&nbsp;&nbsp;&nbsp;&nbsp;
				<Select v-bind:disabled="arrangeChangeType=='systemChange'"  v-model="arrangeAdd.id"  style="width:300px">
					<Option v-for="item in artList" :value="item.id" :key="item.id">{{ item.username }}</Option>
				</Select>
			</div>
			<div class="arrange-title-second">
				<div class="service-type">全部</div>
			</div>
			<div class="arrange-service">
				<div class="service-item" v-model="arrangeAdd.goodid" v-bind:class="{active:selectedServiceId==service.id}" v-for="(service,index) in serviceList" @click="selectService(service.id)">				
					<div class="service-item-name">{{service.title}}</div>
					<div class="service-item-fee">单价：{{service.fee}}/元</div>
					<div class="service-item-time">时间:{{service.duration}}分钟</div>
				</div>
			</div>
			<div slot="footer">
				<div class="footer-btns">
					<div class="footer-left-btn" @click="arrange()">确定并继续</div>
					<div class="footer-center-btn" @click="arrange(1)">确定并关闭</div>
					<div class="footer-right-btn" @click="modal_arrange=false">取消</div>
				</div>
			</div>
		</Modal>

		<!-- 对话框 贵宾等待 -->
		<Modal v-model="modal_vipwait" class-name="vertical-center-modal modal-vipwait-modal">
			<div slot="header" class="modal-header modal-vipwait-header">
				<div class="vipwait-title title-big">贵宾等待</div>
				<div class="vipwait-title">等待房间：{{waitRoomData.wr}}</div>
				<div class="vipwait-title">等待人数：{{waitRoomData.wp}}</div>
			</div>
			<div class="vipwait-content">				
				<Table :columns="waitRoomTable" :data="waitRoomData.list"></Table>
			</div>
			<div slot="footer">
				<div class="footer-btns">
					<div class="footer-left-btn" v-show="false" @click="modal_vipwait_addArtificer=true">安排技师</div>
					<div class="footer-center-btn" @click="modal_vipwait_add=true">添加</div>
					<div class="footer-right-btn vipwait-reload-btn" @click="modal_vipwait=false">刷新</div>
				</div>
			</div>
		</Modal>
		<!-- 对话框  贵宾等待-安排技师 -->
		<Modal v-model="modal_vipwait_addArtificer" class-name="vertical-center-modal modal-vipwait-addArtificer-modal">
			<div slot="header" class="modal-header modal-vipwait-header">
				<div class="vipwait-title title-big">添加等待</div>
			</div>
			<div class="vipwait-content vipwait-add-content">				
				<Form :model="waitAddArtificer" label-position="left" :label-width="120">
					<FormItem label="房间编号">
						<Select v-model="waitAddArtificer.roomNumber" placeholder="请选择房间编号">
							<Option value="101">101</Option>
							<Option value="102">102</Option>
							<Option value="103">103</Option>
							<Option value="104">104</Option>
						</Select>
					</FormItem>
					<FormItem label="安排类型">
						<Select v-model="waitAddArtificer.type" placeholder="请选择类型">
							<Option value="点钟">点钟</Option>
						</Select>
					</FormItem>
					<FormItem label="技师编号">
						<Select class="vipwait-inline-input" v-model="waitAddArtificer.artificerGander" placeholder="请选择技师性别">
							<Option value="男">男</Option>
							<Option value="女">女</Option>
						</Select>
						<Input class="vipwait-inline-input" v-model="waitAddArtificer.count" placeholder="请输入等待人数"></Input>
					</FormItem>
					<FormItem label="服务项目">
						<Select v-model="waitAddArtificer.serviceType" placeholder="请选择服务项目">
							<Option value="足浴60分钟">足浴60分钟</Option>
							<Option value="SPA60分钟">SPA60分钟</Option>
						</Select>
					</FormItem>
					<FormItem label="优先安排">
						<Select v-model="waitAddArtificer.level"placeholder="请选择优先级">
							<Option value="是">是</Option>
							<Option value="否">否</Option>
						</Select>
					</FormItem>
				</Form>
			</div>
			<div slot="footer">
				<div class="footer-btns">
					<div class="footer-left-btn" @click="modal_vipwait_affirm=true">确定提交</div>					
					<div class="footer-right-btn" @click="modal_vipwait_addArtificer=false">取消</div>
				</div>
			</div>
		</Modal>
		<!-- 对话框 房间信息 -->
		<Modal v-model="modal_roomInfo" class-name="vertical-center-modal modal-roomInfo-modal">
			<div slot="header" class="modal-header modal-vipwait-header">
				<div class="vipwait-title title-big">详细信息</div>
				<div class="vipwait-title">上钟人数：{{artStatements.work}}</div>
				<div class="vipwait-title">空闲人数：{{artStatements.free}}</div>
				<div class="vipwait-title">请假人数：{{artStatements.unline}}</div>
			</div>
			<div class="vipwait-content">				
				<Table :columns="roomInfoTable" :data="roomInfoData"></Table>
			</div>
			<div slot="footer" class="roomInfo-footer">
				<div class="roomInfo-footer-btn roomInfo-fee-btn">合计：100.00元</div>
				<Dropdown class="roomInfo-footer-btn roomInfo-chengeRoome-btn"  @on-click="changeRoom">
					换房
					<DropdownMenu slot="list">
						<DropdownItem  v-for="item in roomFreeList" :name="item.id">{{ item.room_name }}</DropdownItem>
					</DropdownMenu>
				</Dropdown>
				<div class="roomInfo-footer-btn roomInfo-cancel-btn" @click="modal_roomInfo=false">取消</div>
			</div>
		</Modal>
		<!-- 对话框  贵宾等待-添加等待 -->
		<Modal v-model="modal_vipwait_add" class-name="vertical-center-modal modal-vipwait-add-modal">
			<div slot="header" class="modal-header modal-vipwait-header">
				<div class="vipwait-title title-big">添加等待</div>
			</div>
			<div class="vipwait-content vipwait-add-content">				
				<Form :model="waitAddInfo" label-position="left" :label-width="120">
					<FormItem label="房间编号">
						<Select v-model="waitAddInfo.roomNumber" placeholder="请选择房间编号">
						    <Option v-for="item in roomFreeList" :value="item.id" :key="item.id">{{ item.room_name }}</Option>
							
						</Select>
					</FormItem>
					<FormItem label="安排类型">
						<Select v-model="waitAddInfo.type" placeholder="请选择类型">
							<Option :value="1">点钟</Option>
							<Option :value="0">排钟</Option>
						</Select>
					</FormItem>
					<FormItem label="技师编号">
						<Input v-model="waitAddInfo.artificerNumber" placeholder="请输入技师编号"></Input>
					</FormItem>
					<FormItem label="服务项目">
						<Select v-model="waitAddInfo.serviceItem" placeholder="请选择服务项目">
							<Option v-for="item in goodslist" :value="item.id" :key="item.id">{{ item.title }}</Option>
						</Select>
					</FormItem>
					<FormItem label="优先安排">
						<Select v-model="waitAddInfo.level" placeholder="请选择优先级">
							<Option :value="1">是</Option>
							<Option :value="0">否</Option>
						</Select>
					</FormItem>
				</Form>
			</div>
			<div slot="footer">
				<div class="footer-btns">
					<div class="footer-left-btn" @click="modal_vipwait_affirm=true">确定提交</div>					
					<div class="footer-right-btn" @click="modal_vipwait_add=false">取消</div>
				</div>
			</div>
		</Modal>
		<!-- 对话框  贵宾等待-操作确认 -->
		<Modal v-model="modal_vipwait_affirm" :closable="false" class-name="vertical-center-modal modal-vipwait-affirm-modal">
			<div slot="header" class="modal-header modal-vipwait-header vipwait-affirm-header">安排技师</div>
			<div class="vipwait-affirm-content">您确定要执行此操作吗？</div>
			<div slot="footer">
				<div class="footer-btns vipwait-affirm-btns">
					<div class="vipwait-affirm-left-btn" @click="vipwait()">确定</div>				
					<div class="vipwait-affirm-right-btn" @click="modal_vipwait_affirm=false">取消</div>
				</div>
			</div>
		</Modal>
		<!-- 对话框 技师状况 -->
		<Modal v-model="modal_artificerStatus" class-name="vertical-center-modal modal-artificerStatus-modal">
			<div slot="header" class="modal-header modal-vipwait-header">
				<div class="vipwait-title title-big">技师状况</div>
				<div class="vipwait-title">上钟人数：{{artStatements.work}}</div>
				<div class="vipwait-title">空闲人数：{{artStatements.free}}</div>
				<div class="vipwait-title">请假人数：{{artStatements.unline}}</div>
			</div>
			<div class="vipwait-content">				
				<Table :columns="artificerStatusTable" :data="artificerStatusData"></Table>
			</div>
			<div slot="footer" style="display:none;">

			</div>
		</Modal>
	</div>
</template>

<script>
import {homeIndex, getRoomList, getSpaArtificerList, getFootArtificerList,homeQueue,waitList,roomList,goodslist,queueList,orderList,artList,artStatement,orderRefund,orderFinsh,orderExRoom,waitAdd,waitDel,waitEdit,queueLogout,queueCall,queueOrder,makeArt} from '../dataManager/index.js'	
export default {
	name:'index',
	data() {
		return {
			'storeyNo':0,//当前楼层,默认0全部
			'modal_arrange':false,
			'modal_roomInfo':false,
			'modal_vipwait':false,
			'modal_vipwait_add':false,
			'modal_vipwait_addArtificer':false,
			'modal_vipwait_affirm':false,
			'modal_artificerStatus':false,
			'arrangeChangeType':'persionChange',	
			'selectedServiceId':'',
			'roomIdToShowOrder':'-1',
			'currenRoomId':1,
			'currenRoom':101,
			'roomList':[],
			'roomFreeList':[],
			'goodslist':[],
			'spaArtificer':[
				// {
				// 	'id':'1',
				// 	'number':'101',
				// 	'gender':'女',
				// 	'status':'1',
				// 	'statusDesc':"空闲"
				// },
				// {
				// 	'id':'2',
				// 	'number':'103',
				// 	'gender':'男',
				// 	'status':'2',
				// 	'statusDesc':"排"
				// },
				// {
				// 	'id':'3',
				// 	'number':'102',
				// 	'gender':'女',
				// 	'status':'3',
				// 	'statusDesc':"点"
				// },
				// {
				// 	'id':'4',
				// 	'number':'106',
				// 	'gender':'男',
				// 	'status':'4',
				// 	'statusDesc':"注销"
				// }
			],
			'footArtificer':[
				// {
				// 	'id':'1',
				// 	'number':'101',
				// 	'gender':'女',
				// 	'status':'1',
				// 	'statusDesc':"空闲"
				// },
				// {
				// 	'id':'2',
				// 	'number':'103',
				// 	'gender':'男',
				// 	'status':'2',
				// 	'statusDesc':"排"
				// },
				// {
				// 	'id':'3',
				// 	'number':'102',
				// 	'gender':'女',
				// 	'status':'3',
				// 	'statusDesc':"点"
				// },
				// {
				// 	'id':'4',
				// 	'number':'106',
				// 	'gender':'男',
				// 	'status':'4',
				// 	'statusDesc':"注销"
				// }
			],
			'waitRoomTable':[
				{
                    'type': 'selection',
                    'width': 60,
                    'align': 'center',
                    'width':50
                },
				{
					'title':'房间编号',
					'key':'roomNumber',
					'width':85
				},
				{
					'title':'安排类型',
					'key':'type',
					'width':85
				},
				{
					'title':'等待人数',
					'key':'waitCount',
					'width':85
				},
				// {
				// 	'title':'技师性别',
				// 	'key':'artificerGender',
				// 	'width':85
				// },
				{
					'title':'技师编号',
					'key':'artificerNumber',
					'width':85
				},
				{
					'title':'服务项目',
					'key':'serviceType',
					'width':100
				},
				{
					'title':'安排时间',
					'key':'time',
					'width':85
				},
				{
					'title':'优先级',
					'key':'level',
					'width':75
				},
				{
					'title':'备注',
					'key':'comments'
				},
				{
					'title':'操作员',
					'key':'operator',
					'width':80
				},
				{
					'title':'操作',
					'key':'',
					'width':150,
					'render':(h,params) =>{
						return h('div',[
							// h('div',{
							// 	props:{},
							// 	attrs:{
							// 		class:"table-icon-btn table-btn-up"
							// 	},
							// 	style:{},
							// 	on:{
							// 		click:() =>{
							// 			alert("向上按钮被点击")
							// 		}
							// 	}
							// },''),
							h('div',{
								props:{},
								attrs:{
									class:"table-icon-btn table-btn-edit"
								},
								style:{},
								on:{
									click:() =>{
										var waitid = params.row.id;
										var waitdp = {'method':'wait.list','id':waitid};
										var _this  = this;
										waitList(waitdp).then(function(data){		
											if (data) {
												_this.waitAddInfo.id = waitid;
												_this.waitAddInfo.roomNumber = data.data.room_id;
												_this.waitAddInfo.type = data.data.way;
												_this.waitAddInfo.serviceItem = data.data.goods_id;
												_this.waitAddInfo.level = data.data.levelkey;
												_this.waitAddInfo.artificerNumber = data.data.artificerNumber;
												_this.modal_vipwait_add = true;
												// console.log(_this.waitAddInfo)
											}
											// _this.changeStorey(0);
											
										}).catch(function(data){
											alert(data);
										})
										// alert("编辑按钮被点击")
									}
								}
							},''),
							h('div',{
								props:{},
								attrs:{
									class:"table-icon-btn table-btn-delete"
								},
								style:{},
								on:{
									click:() =>{
										var waitid = params.row.id;
										var waitdp = {'method':'wait.del','id':waitid};
										var _this  = this;
										waitDel(waitdp).then(function(data){
											console.log(data);		
											_this.$Message.success(data.msg);	
											_this.changeStorey(0);
										}).catch(function(data){
											_this.$Message.error(data.msg);
											// alert(data);

										})
										// alert("删除按钮被点击")
									}
								}
							},'')
						])
					}
				}
			],
			'waitRoomData':[
				// {
				// 	'roomNumber':'105',
				// 	'type':'排钟',
				// 	'waitCount':1,
				// 	'artificerGender':'女',
				// 	'artificerNumber':'102',
				// 	'serviceType':'足浴60分钟',
				// 	'time':'17:51',
				// 	'level':'一般',
				// 	'comments':'无',
				// 	'operator':'马小跳'
				// }
			],
			'waitAddInfo':{
				'id':'',
				'roomNumber':'',
				'type':'',
				'artificerNumber':'',
				'serviceItem':'',
				'level':''
			},
			'waitAddArtificer':{
				'roomNumber':'',
				'type':'',
				'artificerNumber':'',
				'artificerGender':'',
				'serviceType':'',
				'level':''
			},
			'artificerStatusTable':[
				{
					'title':'技师序号',
					'key':'index',
					'width':85
				},
				{
					'title':'技师编号',
					'key':'artificerNumber',
					'width':85
				},
				{
					'title':'技师类型',
					'key':'artificerType',
					'width':85
				},
				{
					'title':'技师性别',
					'key':'artificerGender',
					'width':85
				},
				{
					'title':'技师状态',
					'key':'status',
					'width':85
				},
				{
					'title':'项目名称',
					'key':'serviceType',
					'width':85
				},
				{
					'title':'呼叫时间',
					'key':'callTime',
					'width':85
				},
				{
					'title':'开始时间',
					'key':'beginTime',
					'width':85
				},
				{
					'title':'排钟',
					'key':'onClock',
					'width':85
				},
				{
					'title':'顺序',
					'key':'order',
					'width':60
				},
				{
					'title':'操作',
					'key':'',
					'width':150,
					'render':(h,params) =>{
						return h('div',[
							h('div',{
								props:{},
								attrs:{
									class:"table-icon-btn table-btn-up"
								},
								style:{},
								on:{
									click:() =>{
										var queueid = params.row.id
										var userid = params.row.user_id
										var postion = params.row.postion
										var _this = this;
										var queueop = {'method':'queue.order','id':queueid,'positionid':postion};
										queueOrder(queueop).then(function(data){
											console.log(data);
											_this.changeStorey(0);
											_this.$Message.success(data.msg);
										}).catch(function(data){
											console.log(data);
											_this.$Message.error(data.msg);
										})
										// alert("向上按钮被点击")
									}
								}
							},''),
							h('div',{
								props:{},
								attrs:{
									class:"table-icon-btn table-btn-cel"
								},
								style:{
									display:(params.row.status=='空闲')?"none":"inline-block"
								},
								on:{
									click:() =>{
										var queueid = params.row.id
										var userid = params.row.user_id
										var _this = this;
										var queuecp = {'method':'queue.call','artid':userid,'id':queueid};
										queueCall(queuecp).then(function(data){
											_this.$Message.success(data.msg);
										}).catch(function(data){
											_this.$Message.success(data.msg);
										})
										// console.log(params.row);
										// alert("电话按钮被点击")
									}
								}
							},''),
							h('div',{
								props:{},
								attrs:{
									class:"table-icon-btn table-btn-off"
								},
								style:{},
								on:{
									click:() =>{
										var queueid = params.row.id
										var userid = params.row.user_id
										var _this = this;
										var queuelp = {'method':'queue.logout','artid':userid,'id':queueid};
										queueLogout(queuelp).then(function(data){
											_this.$Message.success(data.msg);
										}).catch(function(data){
											alert(data);
										})
										// console.log(params.row);
										// alert("关机？？？按钮被点击")
									}
								}
							},'')
						])
					}					
				}
			],
			'artificerStatusData':[
				// {
				// 	'index':1,
				// 	'artificerNumber':'105',
				// 	'artificerType':'足浴',
				// 	'artificerGender':'女',
				// 	'status':'空闲',
				// 	'serviceType':'足浴60分钟',
				// 	'callTime':'17:51',
				// 	'beginTime':'21:26',
				// 	'onClock':'点钟',
				// 	'order':1
				// }
			],
			'roomInfoTable':[
				{
					'title':'序号',
					'key':'index',
					'width':60
				},
				{
					'title':'类型',
					'key':'type',
					'width':60
				},
				{
					'title':'名称',
					'key':'serviceName',
					'width':60
				},
				{
					'title':'单价',
					'key':'fee',
					'width':80
				},
				{
					'title':'数量',
					'key':'total',
					'width':60
				},
				{
					'title':'退单量',
					'key':'cancelTotal',
					'width':80
				},
				{
					'title':'小计',
					'key':'tatalFee',
					'width':80
				},
				{
					'title':'技师',
					'key':'artificerNumber',
					'width':60
				},
				{
					'title':'开始时间',
					'key':'beginTime',
					'width':85
				},
				{
					'title':'结束时间',
					'key':'endTime',
					'width':85
				},
				{
					'title':'方式',
					'key':'way',
					'width':60
				},
				{
					'title':'销售员',
					'key':'operator',
					'width':80
				},
				{
					'title':'状态',
					'key':'status',
					'width':100
				},
				{
					'title':'时间',
					'key':'time',
					'width':100
				},
				{
					'title':'操作',
					'key':'',
					'width':200,
					'render':(h,params) =>{
						return h('div',[
							h('div',{
								props:{},								
								style:{
									color:'#80c269',
									float:"left",
									marginRight:"10px",
									cursor:"pointer"									
								},
								on:{
									click:() =>{
										var fid = params.row.id;
										var roomid = params.row.room_id
										var refundp = {'method':'order.refund','id':fid};
										var _this  = this;
										orderRefund(refundp).then(function(data){				
											if (data) {
												_this.showRoomInfo(roomid);
												_this.$Message.success(data.msg);
											}
										}).catch(function(data){
											// alert(data);
											_this.$Message.error(data.msg);
										})
										// console.log(params.row.id);
										// alert("退单按钮被点击")
									}
								}
							},'退单'),
							h('div',{
								props:{},								
								style:{									
									float:"left",
									marginRight:"10px",
									color:"#6fbdff",
									cursor:"pointer"								
								},
								on:{
									click:() =>{
										var fid = params.row.id;
										var roomid = params.row.room_id
										var refundp = {'method':'order.refund','id':fid};
										var _this  = this;
										orderRefund(refundp).then(function(data){				
											if (data) {
												_this.showRoomInfo(roomid);
												_this.$Message.success(data.msg);
											}
										}).catch(function(data){
											// alert(data);
											_this.$Message.error(data.msg);
										})
										// alert("撤钟按钮被点击")
									}
								}
							},'撤钟'),
							h('div',{
								props:{},								
								style:{									
									float:"left",
									marginRight:"10px",
									color:"#6fbdff",
									cursor:"pointer"
								},
								on:{
									click:() =>{
										var fid = params.row.id;
										var roomid = params.row.room_id
										var refundp = {'method':'order.finsh','id':fid};
										var _this  = this;
										orderFinsh(refundp).then(function(data){				
											if (data) {
												_this.showRoomInfo(roomid);
												_this.$Message.success(data.msg);
											}
										}).catch(function(data){
											_this.$Message.error(data.msg);
											// alert(data);
										})
										// alert("下钟按钮被点击")
									}
								}
							},'下钟')
						])
					}					
				}
			],
			'roomInfoData':[
				// {
				// 	'index':'1',
				// 	'type':'服务',
				// 	'serviceName':'足浴',
				// 	'fee':'60',
				// 	'total':'1',
				// 	'cancelTotal':'0',
				// 	'tatalFee':'100.00',
				// 	'artificerNumber':'08',
				// 	'beginTime':'12：08',
				// 	'endTime':'13：08',
				// 	'way':'排',
				// 	'operator':'06',
				// 	'status':'正常',
				// 	'time':'06/12 18:22',
				// }
			],
			'serviceList':[
				{
					'id':'1',
					'name':'足浴60分钟',
					'fee':'100',
					'duration':'60'
				},
				{
					'id':'2',
					'name':'SPA60分钟',
					'fee':'100',
					'duration':'60'
				},
				{
					'id':'3',
					'name':'足浴60分钟',
					'fee':'100',
					'duration':'60'
				},
				{
					'id':'4',
					'name':'SPA60分钟',
					'fee':'100',
					'duration':'60'
				},
				{
					'id':'5',
					'name':'足浴60分钟',
					'fee':'100',
					'duration':'60'
				}
			],
			'artList':[],
			'homeIndexs':[],
			'homeSelIndexs':[],
			'artStatements':{'free':0,'work':0,'unline':0},
			'arrangeAdd':{
				'id':'',
				'roomid':'',
				'goodid':'',
				'system':'',
				'woman':'',
				'man':'',
				'secret':''
			},

		}
	},
	created () {
		this.initStorey();
		// this.changeStorey(0);
	},
	methods:{
		pageBack: function () {
			window.history.go(-1);
		},
		reload: function () {
			this.changeStorey(0);
			this.$Message.success('reload success');
		},
		initStorey: function (){
			var indexp = {'method':'home.index'};
			var _this  = this;
			homeIndex(indexp).then(function(data){				
				if (data) {
					_this.homeIndexs = data.data
					_this.changeStorey(0);
				}
			}).catch(function(data){
				alert(data);
			})
		},
		changeStorey: function (storeyNo) {
			this.storeyNo = storeyNo;
			var _this = this;
			// console.log(_this.homeIndexs[storeyNo].room);
			if (_this.homeIndexs) {
				_this.roomList = _this.homeIndexs[storeyNo].room;
			}
			// var data = {};
			// data.storeyNo = storeyNo;
			// getRoomList(data).then(function(data){	
			// 	_this.roomList = data.data;
			// }).catch(function(data){
			// 	alert(data);
			// })
			var queue = {'method':'home.queue'};
			homeQueue(queue).then(function(data){				
				if(data[0]){_this.spaArtificer = data[0]} 
				if(data[1]){_this.footArtificer = data[1]}
			}).catch(function(data){
				alert(data);
			})
			//等待列表
			var waitlistp = {'method':'wait.list'};
			waitList(waitlistp).then(function(data){
				if (data) {_this.waitRoomData=data.data}
			}).catch(function(data){
				alert(data);
			})
			//空闲房间
			var roomFree = {'method':'room.list','free':true};
			roomList(roomFree).then(function(data){
				if (data) {_this.roomFreeList=data.data}
			}).catch(function(data){
				alert(data);
			})
			//服务项目
			var goodsp = {'method':'goods.list'};
			goodslist(goodsp).then(function(data){
				if (data) {_this.goodslist=data.data}
				if (data) {_this.serviceList=data.data}
			}).catch(function(data){
				alert(data);
			})
			//技师状况
			var queuep = {'method':'queue.list'};
			queueList(queuep).then(function(data){
				if (data) {_this.artificerStatusData=data.data}
			}).catch(function(data){
				alert(data);
			})
		},
		makeRoomArt: function (roomId,name){
			var _this = this;
			_this.currenRoomId = roomId;
			_this.currenRoom = name;
			//技师状况
			var artp = {'method':'art.list'};
			artList(artp).then(function(data){
				_this.modal_arrange = true;
				if (data) {_this.artList = data.data}
			}).catch(function(data){
				alert(data);
			})
		},
		showRoomInfo: function (roomId,name){
			var _this = this;
			_this.currenRoomId = roomId;
			_this.currenRoom = name;
			//技师状况
			var queuep = {'method':'order.list','roomid':roomId};
			orderList(queuep).then(function(data){
				_this.modal_roomInfo = true;
				if (data) {_this.roomInfoData = data.data}
			}).catch(function(data){
				_this.$Message.error(data.msg);
			})
			//统计
			var statementp = {'method':'art.statement'};
			artStatement(statementp).then(function(data){
				if (data) {_this.artStatements = data}
			}).catch(function(data){
				_this.$Message.error(data.msg);
			})

			
		},
		changeRoom: function (name) {
			var _this = this;
			var roomid = _this.currenRoomId;
			if (!roomid) {alert('缺失参数'); return false;}
			// 换房间
			var exroomp = {'method':'order.exRoom','roomid':roomid,'id':name};
			orderExRoom(exroomp).then(function(data){
				_this.changeStorey(0);
				_this.$Message.success(data.msg);
			}).catch(function(data){
				_this.$Message.error(data.msg);
			})
		},
		vipwait: function () {
			var _this = this;
			if (!_this.waitAddInfo.artificerNumber||!_this.waitAddInfo.roomNumber||!_this.waitAddInfo.serviceItem) {alert('缺失参数'); return false;}
			// 添加等待			
			var waitAddp = {'method':'wait.add','id':_this.waitAddInfo.id,'room_id':_this.waitAddInfo.roomNumber,'waite_num':1,'jsno':_this.waitAddInfo.artificerNumber,'level':_this.waitAddInfo.level,'goods_id':_this.waitAddInfo.serviceItem,'way':_this.waitAddInfo.type};
			waitAdd(waitAddp).then(function(data){
				_this.modal_vipwait_affirm = false;
				_this.modal_vipwait_add = false;
				_this.changeStorey(0);
				_this.$Message.success(data.msg);
			}).catch(function(data){
				_this.$Message.error(data.msg);
				// alert(data);
			})
			console.log(_this.waitAddInfo);
		},
		arrange: function(tag) {
			var _this = this;
			var roomid = _this.currenRoomId;
			// console.log(_this.arrangeAdd);
			// console.log(roomid);
			// console.log(_this.selectedServiceId)
			// console.log(_this.arrangeChangeType);
			if (!_this.selectedServiceId) {this.$Message.error('缺失参数');return false;}
			if (_this.arrangeChangeType=='persionChange'&&!_this.arrangeAdd.id)  {this.$Message.error('请选择技师');return false;}
			//安排
			var makeArtp = {'method':'make.art','id':_this.arrangeAdd.id,'roomid':roomid,'goodid':_this.selectedServiceId,'system':_this.arrangeChangeType,'woman':_this.arrangeAdd.woman,'man':_this.arrangeAdd.man,'secret':_this.arrangeAdd.secret};
			
			makeArt(makeArtp).then(function(data){
				_this.$Message.success(data.msg);
				_this.changeStorey(0);
			}).catch(function(data){
				_this.$Message.error(data.msg);
			})

			//确认关闭
			if (tag) {
				_this.modal_arrange = false;
			}
		},
		changeArrangeType: function (type) {
			this.arrangeChangeType = type;
		},
		selectService: function (serviceId) {
			this.selectedServiceId = serviceId;
		},
		roomShowOrder: function (roomId) {
			this.roomIdToShowOrder = roomId;
		}
	}
}	
</script>

<style>
  .index-header{
	height: 100px!important;
	padding:10px 100px!important;
    background:#6fbdff!important;
  }	
  .header-btn{  	
  	float: left;
  	width:80px;
  	height: 80px;    	
  	cursor: pointer;
  	color:#ffffff;
  	font-size: 16px;
  	line-height: 125px;
  	text-align: center;
  	background-size: 40px 40px;
  	background-repeat: no-repeat;
  	background-position: 20px 10px;
  }
  .btn-reload{
  	background-image: url("../assets/1.png");
  }
  .btn-vip{
  	background-image: url("../assets/2.png");
  }
  .btn-artificer{
  	background-image: url("../assets/3.png");
  }
  .btn-appointment{
  	background-image: url("../assets/4.png");
  }
  .btn-goback{
  	float: right;
  	background-image: url("../assets/18.png");
  }

  .index-content{
  	position: relative;
	height:600px;  
	padding:20px;
	background: #f5f5f5;
  }
  .content-storeys{  	
  	height: 100%!important;
  	padding: 20px 0!important;
  	background: #ffffff!important;
  }
  .content-storey{
  	position: relative;
  	margin-left: 10px;
  	width: 40px;
  	height:105px;  	
  	border-bottom: 2px solid #eee;
  	cursor: pointer;
  }
  .content-storey:last-child{
  	border-bottom:none;	
  }
  .content-storey-border{
	position: absolute;
	width: 5px;
	height: 87px;
	top: 8px;
	right: -10px;
	background:#6fbdff; 
  }
  .content-storey-text{
  	position: absolute;
  	top: 20px;
  	left:5px;
  	width: 30px;
  	height: 60px;  	
  	font-size: 20px;
  	line-height: 30px;
  	text-align: center;
  	font-weight: 600;
  	color: #999;
  }
  .content-storey.active .content-storey-text{
  	color: #6fbdff;
  }
  .content-rooms{
  	position: absolute;
  	top: 20px;
  	left: 100px;
  	right: 20px;
  	height: 560px;
  	padding: 10px 0;
  	background: #fff;
  }
  .content-room{  	
  	position: relative;
  	float: left;
  	width: 150px;
  	height: 190px;
  	margin: 20px 0 0 20px;
  }
  .room-title{
	position: relative;
  	width: 100%;
  	height: 38px;
  	background: #6fbdff;
  	border:1px solid #6fbdff;
  	border-top-left-radius: 3px;
  	border-top-right-radius: 3px;
  }
  .content-room .room-title-text{
	position: absolute;
	top: 0;
	right: 38px;
	bottom: 0;
	left: 0;
	padding-left: 10px;
	color: #fff;
	font-size: 20px;
	text-align: left;
	line-height: 38px;
  }
  .content-room .room-title-btn{
  	position: absolute;
  	top: 0;
  	right: 0;
  	bottom: 0;
  	width: 38px;
  	background-image: url("../assets/5.png");
  	background-size: 38px 38px;
  	cursor: pointer;
  }
  .room-order{
  	position: absolute;
  	z-index: 10;
  	width: 95px;
  	height: 160px;
  	top: 30px;
  	right: -65px;
  	padding: 5px 12px;
  	background: #fff;
  	border:1px solid #eee; 
  	border-radius: 3px;
  	box-shadow: 3px 3px 3px #eee;
  	display: none;
  }
  .room-order:hover{
  	cursor: pointer;
  }
  .order-item{
  	width: 100%;
  	height: 37px;
  	line-height: 40px;
  	font-size: 16px;
  	color: #999;
  	text-align: left;
  	border-bottom: 1px solid #eee;
  }
  .order-item:last-child{
  	border-bottom: none;
  }
  .room-content{
  	width: 100%;
  	height: 150px;  	
  	display: none;
  	border-left: 3px solid #6fbdff;
  	border-right: 3px solid #6fbdff;
  	border-bottom: 3px solid #6fbdff;
  	border-bottom-left-radius: 3px;
  	border-bottom-right-radius: 3px;
  }
  .room-content.spare .spare-text1{
	width: 100%;
	height: 110px;
	font-size: 30px;	
	text-align: center;
	line-height: 110px;
	color: #80c269;
  }
  .room-content.spare .spare-text2{
	width: 87px;
	height: 28px;
	margin-left:23px;
	font-size: 15px;	
	text-align: center;
	line-height: 28px;
	background-image: url("../assets/6.png");
	background-repeat: no-repeat;
	color: #fff;
  }
  .room-content.cleaning{
  	background-image: url("../assets/7.png");
  	background-repeat: no-repeat;
  	background-size: 70px 70px;
  	background-position: 30px 35px;
  }
  .working-info{
  	width: 100%;
  	height: 37px;
  	padding: 0 2px;
  	color: #c0c0c0;
  	font-size: 14px;
  	line-height: 35px;
  	text-align: right;
  	border-bottom: 1px solid #eee;
  	background-size: 25px 25px;
  	background-repeat: no-repeat;
  	background-position: 0 4px;
  }
  .working-info:last-child{
  	border-bottom: none;
  }
  .working-info.info-name{
  	background-image: url("../assets/8.png");
  }
  .working-info.info-tel{
  	background-image: url("../assets/9.png");
  }
  .working-info.info-count{
  	background-image: url("../assets/10.png");
  }
  .working-info.info-time{
  	background-image: url("../assets/11.png");
  }
  .room-content.settlement{
  	border:none;
  }
  .settlement-info-custom{
  	width: 100%;
  	height: 35px;
  	border-bottom: 1px solid #eee;
  }
  .custom-location{
	float: left;
	width: 50%;
	text-align: left;
	line-height: 35px;
	color: #999;
  }
  .custom-count{
	float: left;
	width: 50%;
	text-align: right;
	line-height: 35px;
	color: #f4ab2b;
  }
  .settlement-info-fee{
  	position: absolute;
  	width: 100%;
  	height: 30px;
  	line-height: 30px;
  	left: 0;
  	bottom: 0;
  	color: #fff;
  	text-align: center;
  	background: #6fbdff;
  }

  .index-footer{
  	text-align: center;
	height: auto;	
	margin: 0;
	padding: 0;
	background-color: #fff!important;
  }
  .footer-artificers{
  	position: relative;
  	width: 100%;
  	height: 100px;  	
  }
  .artificer-type{
	position: absolute;
	width: 120px;
	left: 0;
	top: 0;
	bottom: 0;
	background-size: 50px 50px;
	background-repeat: no-repeat;
	background-position: 35px 15px;
	line-height: 160px;
  }
  .type-foot{
  	background-image: url("../assets/12.png");
	color: #f4ab2b;
  }
  .type-spa{
  	background-image: url("../assets/13.png");
  	color: #ff8672;
  }
  .artificer-items{
  	position: absolute;	
	left: 120px;
	right: 0;
	top: 0;
	bottom: 0;
  }
  .artificer-item{
  	position: relative;
  	float: left;
  	width: 60px;
  	height: 60px;
  	border-radius: 100%;
  	margin: 20px;
  	background: #f4ab2b;
  	color: #eee;
  	font-weight: 600;
  	padding: 10px 0;
  }
  .artificer-item.free{
	background: #80c269;
  }
  .artificer-item.onclock{
	background: #f4ab2b;
  }
  .artificer-item.inline{
	background: #f4ab2b;
  }
  .artificer-item.logoff{
	background: #ccc;
  }
  .artificer-item.logoff .artificer-gender{
  	display: none;
  }
  .artificer-item .artificer-gender{
	position: absolute;
	width: 25px;
	height: 25px;
	top: -7px;
	right: -7px;
	border-radius: 100%;
	background-color: #fff;
	background-repeat: no-repeat;
	background-position: 0 0;
	background-size: 25px 25px;
  } 
  .artificer-item .artificer-gender.male{
  	background-image: url("../assets/14.png");
  }
  .artificer-item .artificer-gender.female{
  	background-image: url("../assets/15.png");
  }  
  .artificer-number{
	height: 20px;
  }
  .artificer-status{
	height: 20px;
  }
  .content div.active{
  	display: block;
  }

  .ivu-modal-header,
  .ivu-modal-body,
  .ivu-modal-footer{  
  	padding: 0!important;
  }
  .ivu-modal-header{
  	border-bottom: none;
  }
  .ivu-modal-footer{
	border-top: none;
  }
  .vipwait-add-content .ivu-input{
  	height: 50px!important;
  	font-size: 18px!important;
  }
  .ivu-form-item{
  	margin-bottom: 0;
  	margin: 20px 0;
  }
  .ivu-modal-footer{
  	border-top: none!important;
  }
  .ivu-form .ivu-form-item-label{
  	height: 50px;
  	padding: 0!important;
  	color: #999!important;
  	font-weight: 600;
  	line-height: 50px!important;
  	font-size: 18px!important;
  }
  .ivu-select-single .ivu-select-selection{
  	height: 50px!important;

  }
  .vipwait-add-content .ivu-select-single .ivu-select-selection .ivu-select-placeholder, 
  .vipwait-add-content .ivu-select-single .ivu-select-selection .ivu-select-selected-value{
  	height:50px!important;
  	line-height: 50px!important;
  	font-size: 18px!important;
  }
  .vertical-center-modal{
  	display: flex;
  	align-items: center;
  	justify-content: center;
  }
  .vertical-center-modal .ivu-modal{
  	top: 0;
  }
  .modal-roomInfo-modal .ivu-table-wrapper{
  	overflow: visible;
  }
  .modal-header{
  	position: relative;
  	height: 50px;
  	width: 100%;
  	line-height: 50px;  	
  }
  .modal-arrange-header{
  }
  .arrange-title{
	position: absolute;
	height: 50px;
	left: 30px;	
	font-size: 18px;
	width: 10em;
	font-weight: 600;
  }
  .arrange-type{
  	position: absolute;
  	top: 0;
  	font-size: 18px;
  	height: 50px;
  	width: 15em;
  	left: 200px;
  }
  .arrange-type .type-item{
  	float: left;
  	padding-left: 8px;
  	margin:12px 5px;
  	height: 25px;
  	width: 6.5em;
  	font-size: 16px;
	line-height: 25px;
	background-image: url("../assets/17.png");
	background-repeat: no-repeat;
	background-size: 15px 15px;
	background-position: 80px 4.5px;
	border-radius: 3px;
	color: #fff;
	background-color: #888;
	cursor: pointer;
  }
  .arrange-type .type-item.active{
	background-image: url("../assets/16.png");
	background-color: #6fbdff;
  }
  .arrange-info{
  	width: 94%;
  	height: 70px;
  	margin: 0 3%;
  	font-size:18px;
  	padding: 20px 0 0;
  }
  .arrange-info .ivu-input{
	height: 40px!important;
	width: 150px!important;
  }
  .arrange-info .ivu-select-single .ivu-select-selection{
  	height: 40px!important;
  	line-height: 40px!important;
  }
  .arrange-info .ivu-select-placeholder{
	height: 40px!important;
	line-height: 40px!important;
  }
  .arrange-info:first-child{
  	border-bottom: 1px solid #eee;
  }
  .arrange-title-second{
  	width: 100%;
  	height: 50px;
  	padding: 0 20px;
  	background-color: #6fbdff;
  }
  .service-type{
  	float: left;
	width: 50px;
	height: 50px;
	font-size: 18px;
	font-weight: 600;
	text-align: center;
	line-height: 50px;
	color: #fff;
  }
  .arrange-service{
  	width: 100%;
  	min-height: 120px;
  	max-height: 400px;  	
  	overflow: auto;
  }
  .service-item{
  	position: relative;
  	float: left;
  	width: 260px;
  	height: 85px;
  	margin: 10px 30px;
  	border:2px solid #999;
  	border-radius: 3px;
  	color: #999;
  	cursor: pointer;
  }
  .service-item.active{
  	border-color: #6fbdff;
  	color: #6fbdff;
  }
  .service-item .service-item-name{
  	width: 100%;
  	height: 45px;
  	padding-left: 10px;
  	font-size: 18px;
  	font-weight: 600;
  	text-align: left;
  	line-height: 45px;
  }
  .service-item .service-item-fee{
  	position: absolute;
  	left: 0;
  	bottom: 0;
  	width: 45%;
  	height: 40px;
	text-align: left;
	font-size: 16px;
	line-height: 40px;
	padding-left: 10px;
  }
  .service-item .service-item-time{
  	position: absolute;
  	right: 0;
  	bottom: 0;
  	width: 45%;
  	height: 40px;
	text-align: right;
	font-size: 16px;
	line-height: 40px;
	padding-right: 10px;
  }

  .footer-btns{
  	position: relative;
  	width: 100%;
  	height: 90px;
  	padding: 20px 30px;
  	font-size: 18px;
  	font-weight: 600;
  	text-align: center;
  	line-height: 50px;
  	color: #fff;
  }
  .footer-left-btn{
	position: absolute;
	left: 40px;
	top: 20px;
	width: 350px;
	height: 50px;
	background-color: #6fbdff;
	border-radius: 5px;
	cursor: pointer;
  }
  .footer-center-btn{
	position: absolute;
	left: 435px;
	top: 20px;
	width: 350px;
	height: 50px;
	background-color: #f4ab2b;
	border-radius: 5px;
	cursor: pointer;
  }
  .footer-right-btn{
	position: absolute;
	right: 40px;
	top: 20px;
	width: 150px;
	height: 50px;
	background-color: #bbb;
	border-radius: 5px;
	cursor: pointer;
  }
  .modal-vipwait-header{
  	width: 94%;
  	margin: 0 3%;
  	font-size: 16px;
  	line-height: 50px;
  	text-align: left;
  	color: #999;
  	border-bottom: 1px solid #eee;
  }
  .vipwait-title{
	width: 120px;
	height: 50px;
	float: left;
  }
  .vipwait-title.title-big{
  	font-size: 18px;
  	font-weight: 600;
  }
  .vipwait-content{
  	padding: 0 35px 35px 35px;
  	width: 100%;
  	min-height: 200px;
  	max-height: 550px;
  }
  .vipwait-content.vipwait-add-content{
  	height: 400px;
  	font-size: 18px;
  	line-height: 45px;
  	padding-top: 20px;
  	padding-left: 50px;
  	padding-right: 50px;

  }
  .vipwait-content .ivu-table-body{
  	max-height: 480px;
	overflow-y: scroll;
  }
  .vipwait-reload-btn{
  	background-color: #80c269;
  }
  .vipwait-affirm-header{
  	border-bottom: none;
  	text-align: center;
  }
  .vipwait-affirm-content{
  	height: 80px;
  	font-size: 20px;
  	line-height: 50px;
  	font-weight: 600;
  	color: #999;
  	text-align: center;
  	border-bottom: 1px solid #eee;
  }
  .vipwait-affirm-btns{
  	position: relative;
  	padding: 5px 0;
  	height: 60px;
  }
  .vipwait-affirm-left-btn{
	position: absolute;
	top: 10px;
	left: 0;
	width: 50%;
	height: 40px;
	line-height: 40px;
	text-align: center;
	border-right: 1px solid #eee;
	color: #6fbdff;
  }
  .vipwait-affirm-right-btn{
	position: absolute;
	width: 50%;
	top: 10px;
	right: 0;
	width: 40%;
	height: 40px;
	line-height: 40px;
	text-align: center;
	color: #999;
  }
  .vipwait-inline-input{
  	display: inline-block!important;
  	width: 45%!important;
  }
  .vipwait-inline-input:last-child{
  	margin-left: 6%!important;
  }
  .roomInfo-footer{
  	width: 100%;
  	height: 50px;
  }
  .roomInfo-footer-btn{
  	float: left;
  	color: #fff;
  	height: 40px;
  	text-align: center;
  	border-radius: 5px;
  	font-size: 18px;
  	line-height: 40px;
  	font-weight: 600;
  	background-color: #6fbdff;
  	margin-right: 2%;
	margin-top: 5px;
	cursor: pointer;
  }
  .roomInfo-fee-btn{
	width: 25%;
	height: 50px;
	line-height: 50px;
	margin-top: 0;
	border-radius: 0;
  }
  .roomInfo-recall-btn{
	width: 10%;
  }
  .roomInfo-onclock-btn{
	width: 10%;
  }
  .roomInfo-offclock-btn{
	width: 10%;
  }
  .roomInfo-chengeService-btn{
  	padding-left:40px;
  	text-align: left;
	width: 15%;
	background-color: #80c269;
	background-image: url("../assets/22.png");
	background-repeat: no-repeat;
	background-size: 20px 20px;
	background-position: 120px 10px;
  }
  .roomInfo-chengeRoome-btn{  	
  	padding-left:50px;
  	text-align: left;
	width: 15%;
	background-color: #f4ab2b;
	background-image: url("../assets/22.png");
	background-repeat: no-repeat;
	background-size: 20px 20px;
	background-position: 120px 10px;
  }
  .roomInfo-cancel-btn{
  	float: right;
	width: 10%;
	background-color: #999;
  }
  .table-icon-btn{
  	float: left;
  	width: 1.5em;
  	height:1.5em;
  	margin: 0 0.5em;
  	background-size: 100% 100%;
  	background-repeat: no-repeat;
  	background-position: 0 0;
  	cursor: pointer;
  }
  .table-icon-btn.table-btn-up{
  	background-image: url("../assets/21.png");
  }
  .table-icon-btn.table-btn-edit{
  	background-image: url("../assets/19.png");
  }
  .table-icon-btn.table-btn-delete{
  	background-image: url("../assets/20.png");
  }
  .table-icon-btn.table-btn-cel{
  	background-image: url("../assets/23.png");	
  }
  .table-icon-btn.table-btn-off{
  	background-image: url("../assets/24.png");	
  }
  .modal-vipwait-modal .ivu-modal{
  	width: 1020px!important;
  }
  .modal-arrange-modal .ivu-modal{
  	width: 1020px!important;	
  }
  .modal-vipwait-addArtificer-modal .ivu-modal{
  	width: 600px!important;
  }
  .modal-roomInfo-modal .ivu-modal{
  	width: 1020px!important;
  }
  .modal-vipwait-add-modal .ivu-modal{
	width: 600px!important;
  }
  .modal-vipwait-affirm-modal .ivu-modal{
  	width: 500px!important;	
  }
  .modal-artificerStatus-modal .ivu-modal{
	width: 1020px!important;
  }
  ::-webkit-scrollbar {
    width: 0.15rem;
    height: 0.15rem;
    background-color: #f1f1f1;
  }

  ::-webkit-scrollbar-thumb {
    border-radius: 0; 
    background-color: #c1c1c1;
    transition: all .2s;
    border-radius: 0.15rem;
  }

</style>


