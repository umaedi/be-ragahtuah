import{L as b}from"./Admin.5c905206.js";import{H as f,L as h,r as p,a as i,o as l,c as r,b as d,w as c,d as t,e as v,f as w,v as y,t as k,g as x,F as g,h as K,i as m}from"./app.f690202d.js";import{S as L}from"./sweetalert2.all.0afec5c5.js";import{_ as N}from"./_plugin-vue_export-helper.cdc0426e.js";const S={layout:b,components:{Head:f,Link:h},props:{errors:Object,classroom:Object},setup(o){const s=p({title:o.classroom.title});return{form:s,submit:()=>{K.Inertia.put(`/admin/classrooms/${o.classroom.id}`,{title:s.title},{onSuccess:()=>{L.fire({title:"Success!",text:"Kelas Berhasil Diupdate!.",icon:"success",showConfirmButton:!1,timer:2e3})}})}}}},B=t("title",null,"Edit Kelas - Aplikasi Ujian Online",-1),V={class:"container-fluid mb-5 mt-5"},C={class:"row"},E={class:"col-md-12"},H=t("i",{class:"fa fa-long-arrow-alt-left me-2"},null,-1),j=m(" Kembali"),D={class:"card border-0 shadow"},M={class:"card-body"},O=t("h5",null,[t("i",{class:"fa fa-clone"}),m(" Edit Kelas")],-1),U=t("hr",null,null,-1),A={class:"mb-4"},F=t("label",null,"Nama Kelas",-1),T={key:0,class:"alert alert-danger mt-2"},I=t("button",{type:"submit",class:"btn btn-md btn-primary border-0 shadow me-2"},"Update",-1),R=t("button",{type:"reset",class:"btn btn-md btn-warning border-0 shadow"},"Reset",-1);function q(o,s,a,e,z,G){const _=i("Head"),u=i("Link");return l(),r(g,null,[d(_,null,{default:c(()=>[B]),_:1}),t("div",V,[t("div",C,[t("div",E,[d(u,{href:"/admin/classrooms",class:"btn btn-md btn-primary border-0 shadow mb-3",type:"button"},{default:c(()=>[H,j]),_:1}),t("div",D,[t("div",M,[O,U,t("form",{onSubmit:s[1]||(s[1]=v((...n)=>e.submit&&e.submit(...n),["prevent"]))},[t("div",A,[F,w(t("input",{type:"text",class:"form-control",placeholder:"Masukkan Nama Kelas","onUpdate:modelValue":s[0]||(s[0]=n=>e.form.title=n)},null,512),[[y,e.form.title]]),a.errors.title?(l(),r("div",T,k(a.errors.title),1)):x("",!0)]),I,R],32)])])])])])],64)}const X=N(S,[["render",q]]);export{X as default};
