(()=>{"use strict";var e,t={895:()=>{const e=Vue;var t={class:"flex w-full flex-col items-center justify-between px-3 py-3"},l={class:"text-4xl font-semibold"},o={class:"text-sm uppercase"};const a={__name:"StatBox",props:{mainStat:{required:!0},title:{required:!0},diff:{required:!0},up:{type:Boolean}},setup:function(a){var n=a;return function(r,c){return(0,e.openBlock)(),(0,e.createElementBlock)("div",t,[(0,e.createElementVNode)("div",l,(0,e.toDisplayString)(n.mainStat),1),(0,e.createElementVNode)("div",o,[(0,e.createTextVNode)((0,e.toDisplayString)(n.title)+" ",1),(0,e.createElementVNode)("span",{class:(0,e.normalizeClass)([a.up?"text-green-500":"text-red-500"])},[n.up?((0,e.openBlock)(),(0,e.createElementBlock)(e.Fragment,{key:0},[(0,e.createTextVNode)("+")],64)):((0,e.openBlock)(),(0,e.createElementBlock)(e.Fragment,{key:1},[(0,e.createTextVNode)("-")],64)),(0,e.createTextVNode)(" "+(0,e.toDisplayString)(a.diff),1)],2)])])}}};var n={class:"flex w-full justify-between py-4"},r={class:"flex w-full items-center justify-between px-3 py-3"},c={key:0},s=[(0,e.createElementVNode)("option",{value:"7"},"7 Days",-1),(0,e.createElementVNode)("option",{value:"30"},"30 Days",-1),(0,e.createElementVNode)("option",{value:"60"},"60 Days",-1),(0,e.createElementVNode)("option",{value:"90"},"90 Days",-1)],i=["onClick"],u=["href"];const d={__name:"Card",props:{card:{}},setup:function(t){var l,o=t,d=(0,e.ref)((null===(l=o.card)||void 0===l?void 0:l.entityId)||null),f=(0,e.ref)(null),p=(0,e.ref)(null);function v(){Nova.request().get("/nova-vendor/fathom-stats-display/getStats/"+d.value+"/"+f.value).then((function(e){p.value=e.data.statBlocks,f.value=e.data.timePeriod}))}function m(){Nova.request().get("/nova-vendor/fathom-stats-display/refresh").then((function(e){v()}))}(0,e.onMounted)((function(){Nova.request().get("/nova-vendor/fathom-stats-display/getStats/"+d.value).then((function(e){p.value=e.data.statBlocks,f.value=e.data.timePeriod}))}));var k=(0,e.computed)((function(){return null==d.value?null:"https://app.usefathom.com/?site="+d.value}));return function(t,l){var o=(0,e.resolveComponent)("Loader"),d=(0,e.resolveComponent)("IconArrow"),y=(0,e.resolveComponent)("Card",!0);return(0,e.openBlock)(),(0,e.createBlock)(y,{class:"flex flex-col items-center justify-center"},{default:(0,e.withCtx)((function(){return[(0,e.createElementVNode)("div",n,[null===p.value?((0,e.openBlock)(),(0,e.createBlock)(o,{key:0,class:"mx-auto py-6 text-gray-300",width:"60"})):((0,e.openBlock)(!0),(0,e.createElementBlock)(e.Fragment,{key:1},(0,e.renderList)(p.value,(function(t){return(0,e.openBlock)(),(0,e.createBlock)(a,{title:t.title,mainStat:t.mainStat,diff:t.diff,up:t.up},null,8,["title","mainStat","diff","up"])})),256))]),(0,e.createElementVNode)("div",r,[(0,e.createElementVNode)("div",null,[null!==f.value?((0,e.openBlock)(),(0,e.createElementBlock)("div",c,[(0,e.createElementVNode)("div",{class:(0,e.normalizeClass)(["relative flex",t.$attrs.class])},[(0,e.withDirectives)((0,e.createElementVNode)("select",{"onUpdate:modelValue":l[0]||(l[0]=function(e){return f.value=e}),class:(0,e.normalizeClass)(["form-control form-select block w-full",["form-control-xs form-select-bordered",t.selectClasses]]),onChange:v},s,34),[[e.vModelSelect,f.value]]),(0,e.createVNode)(d,{class:"form-select-arrow pointer-events-none"})],2)])):((0,e.openBlock)(),(0,e.createBlock)(o,{key:1,class:"text-gray-300",width:"30"}))]),(0,e.createElementVNode)("div",null,[null!==f.value?((0,e.openBlock)(),(0,e.createElementBlock)("a",{key:0,href:"#",onClick:(0,e.withModifiers)(m,["prevent"])},"Refresh Data",8,i)):((0,e.openBlock)(),(0,e.createBlock)(o,{key:1,class:"text-gray-300",width:"30"}))]),(0,e.createElementVNode)("div",null,[null!==(0,e.unref)(k)?((0,e.openBlock)(),(0,e.createElementBlock)("a",{key:0,href:(0,e.unref)(k)},"Go to Fathom",8,u)):((0,e.openBlock)(),(0,e.createBlock)(o,{key:1,class:"text-gray-300",width:"30"}))])])]})),_:1})}}};Nova.booting((function(e,t){e.component("fathom-stats-display",d)}))},962:()=>{}},l={};function o(e){var a=l[e];if(void 0!==a)return a.exports;var n=l[e]={exports:{}};return t[e](n,n.exports,o),n.exports}o.m=t,e=[],o.O=(t,l,a,n)=>{if(!l){var r=1/0;for(u=0;u<e.length;u++){for(var[l,a,n]=e[u],c=!0,s=0;s<l.length;s++)(!1&n||r>=n)&&Object.keys(o.O).every((e=>o.O[e](l[s])))?l.splice(s--,1):(c=!1,n<r&&(r=n));if(c){e.splice(u--,1);var i=a();void 0!==i&&(t=i)}}return t}n=n||0;for(var u=e.length;u>0&&e[u-1][2]>n;u--)e[u]=e[u-1];e[u]=[l,a,n]},o.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={440:0,458:0};o.O.j=t=>0===e[t];var t=(t,l)=>{var a,n,[r,c,s]=l,i=0;if(r.some((t=>0!==e[t]))){for(a in c)o.o(c,a)&&(o.m[a]=c[a]);if(s)var u=s(o)}for(t&&t(l);i<r.length;i++)n=r[i],o.o(e,n)&&e[n]&&e[n][0](),e[n]=0;return o.O(u)},l=self.webpackChunkcharlie_langridge_fathom_stats_display=self.webpackChunkcharlie_langridge_fathom_stats_display||[];l.forEach(t.bind(null,0)),l.push=t.bind(null,l.push.bind(l))})(),o.O(void 0,[458],(()=>o(895)));var a=o.O(void 0,[458],(()=>o(962)));a=o.O(a)})();