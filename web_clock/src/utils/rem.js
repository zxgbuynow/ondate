export default function() {

    //限制展现页面的最小宽度为1366
    var rootWidth = document.documentElement.clientWidth < 1366 ? 1366 : document.documentElement.clientWidth;
    //以设计图的rem为100
    //设计图尺寸宽 / 100 = 19.2
    document.documentElement.style.fontSize = rootWidth / 19.2 + 'px';

}