<template>
  <div class="score-exchange">
    <navbar text="积分兑换"></navbar>
    <scroller>
      <div class="card-list">
        <div class="card-item" v-for="(item,index) in datas" :key="index">
          <p>{{item.title}}</p>
          <p class="s-gray f-font-md">兑换有效期：
            <span class="f-font-sm s-black">{{timeChange(item.start_time)}} - {{timeChange(item.end_time)}}</span>
          </p>
          <div class="card-item__img">
            <img v-if="item.cover_url" :src="item.cover_url">
            <img v-else src="~images/not-pic.jpg">

            <p class="card-item__img-tt">{{item.coupon}}</p>
          </div>
          <div class="card-item__ft g-flex g-flex__updown-center">
            <p class="g-flex__item">
              {{item.score_limit}}
              <span class="f-font-sm">积分</span>
            </p>
            
            <div v-if="selfTimeStamp >= item.end_time" class="u-button u-button--primary disable">已过期</div>
            <div v-else-if="selfTimeStamp < item.start_time" class="u-button u-button--primary disable">未开始</div>
            <div v-else-if="item.no_count==1" class="u-button u-button--primary disable">已兑换完</div>
            <div v-else class="u-button u-button--primary">兑换</div>
          </div>
        </div>
      </div>
    </scroller>

    

  </div>
</template>

<script>
import { post, host, timeChange } from "@/utils";
import { api } from "@/utils/api";
import navbar from "@/components/navbar";
import { Collapse, CollapseItem } from "vant";
export default {
  data() {
    return {
      datas: [],
      selfTimeStamp: new Date().getTime()
    };
  },
  components: {
    navbar
  },
  computed: {
    

  },

  methods: {
    async getData() {
      const _this = this;
      const data = await api.getScoreExchange();
      this.datas = data.score_exchange;
      // this.datas.map(item => {
      //   item.start_time = timeChange(item.start_time);
      //   item.end_time = timeChange(item.end_time);
      // });
    },
    // 转换时间
    timeChange(time) {
      return timeChange(time, true)
    }
  },

  created() {
    this.getData();
  }
};
</script>
<style lang="scss" scoped>
.card-item {
  background: #fff;
  padding: 15px;
  margin-bottom: 10px;
  &__img {
    position: relative;
    margin: 10px 0 15px;
    img {
      height: 150px;
      background: #eee;
      width: 100%;
    }
    &-tt {
      position: absolute;
      bottom: 0;
      text-align: center;
      background: rgba(0,0,0,.6);
      color: #fff;
      padding: 5px 0;
      font-size: 12px;
      width: 100%;
    }
  }
  &__ft {
    font-size: 20px;
  }
  .u-button.disable {
    opacity: 1;
    background: #eee;
  }
}
</style>
