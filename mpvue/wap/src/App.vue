<template>
  <div id="app" v-cloak>
    <keep-alive>
      <router-view v-if="$route.meta.keepAlive">
          <!-- 这里是会被缓存的视图组件，比如 Home！ -->
      </router-view>
</keep-alive>
<router-view v-if="!$route.meta.keepAlive">
    <!-- 这里是不被缓存的视图组件，比如 Edit！ -->
</router-view>
  </div>
</template>

<script>
import { post, get, host, wx } from "@/utils";
export default {
  name: "app",
  methods: {
    resGetUserInfo() {
      let openid = window.localStorage.getItem("openid");
      return get("shop/api/getUserInfo/openid/" + openid);
    },
    getQueryString (name) {
      var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
      var r = window.location.search.substr(1).match(reg); 
      if (r != null) return unescape(r[2]);
      return null; 
    },
		getNewHost(id) {
			var url=window.location.href;
			var urlArr = url.split("wap/index.html");
			var reg = new RegExp("pbid=([^&]*)(&|$)");
			var param=urlArr[1].match(reg);
			var get_pbid = String(param[1]).replace('#/','')
			var root_url = urlArr[0]
			return `${root_url}index.php?pbid=${id}&s=/`
		}
  },
  created() {
    const _this = this;
    let pbid = parseInt(this.getQueryString('pbid'))
    console.log('pbid为：',pbid);
    //判断是否有缓存过其他公众号的数据，有的话清缓存
    let old_pbid=window.localStorage.getItem("pbid");
    if((window.location.href).indexOf('localhost') == -1) {
      if(old_pbid != pbid){
        //缓存清掉
        window.localStorage.clear();
        window.localStorage.setItem("pbid", pbid);
      }
    }


    let state = window.localStorage.getItem("openid");
    document.title = window.localStorage.getItem("public_name") || "易商城"
    if (state) {
      console.log("我执行了");
      // 判断PHPSESSID是否过期
      post('weiapp/Api/checkLogin/', {
        PHPSESSID: window.localStorage.getItem('PHPSESSID')
      }).then((res) => {
        let data = JSON.parse(res)
        console.log('checkLogin', data.msg)
        if (data.status == 0) {
          if ((window.location.href).indexOf('localhost') == -1) {
            let new_host = _this.getNewHost(pbid)
            window.localStorage.setItem('prevUrl',window.location.href)
            window.location.href = new_host + "weixin/wap/vue_login";
          }
        }
      })
      this.$http
        .all([_this.resGetUserInfo()])
        .then(
          _this.$http.spread(function(records, projects) {

            // 设置用户信息
            window.localStorage.setItem(
              "userInfo",
              JSON.stringify(records.user_info)
            );
          })
        )
        .catch(function(error) {
          console.log(error);
        });
      
      
    } else {
      if ((window.location.href).indexOf('localhost') == -1) {
        //window.location.href = host + "weixin/wap/vue_login";
        let new_host = _this.getNewHost(pbid)
        //alert(new_host + "weixin/wap/vue_login");
        window.localStorage.setItem('prevUrl',window.location.href)
        window.location.href = new_host + "weixin/wap/vue_login";
      }
    }
  }
};
</script>

<style lang="scss">
	#app {
		max-width: 750px;
		margin: 0 auto;
		position: relative;
	}

</style>
