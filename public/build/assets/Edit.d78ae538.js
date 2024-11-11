import{L as y}from"./Admin.5c905206.js";import{H as g,L as S,r as L,a as _,o as a,c as d,b as u,w as f,d as s,e as V,f as i,v as m,t as l,g as c,s as h,F as b,p as x,h as N,i as w}from"./app.f690202d.js";import{S as U}from"./sweetalert2.all.0afec5c5.js";import{_ as M}from"./_plugin-vue_export-helper.cdc0426e.js";const P={layout:y,components:{Head:g,Link:S},props:{errors:Object,classrooms:Array,student:Object},setup(r){const o=L({nisn:r.student.nisn,name:r.student.name,classroom_id:r.student.classroom_id,gender:r.student.gender,password:"",password_confirmation:""});return{form:o,submit:()=>{N.Inertia.put(`/admin/students/${r.student.id}`,{nisn:o.nisn,name:o.name,classroom_id:o.classroom_id,gender:o.gender,password:o.password,password_confirmation:o.password_confirmation},{onSuccess:()=>{U.fire({title:"Success!",text:"Siswa Berhasil Diupdate!.",icon:"success",showConfirmButton:!1,timer:2e3})}})}}}},B=s("title",null,"Edit Siswa - Aplikasi Ujian Online",-1),K={class:"container-fluid mb-5 mt-5"},C={class:"row"},E={class:"col-md-12"},H=s("i",{class:"fa fa-long-arrow-alt-left me-2"},null,-1),j=w(" Kembali"),A={class:"card border-0 shadow"},D={class:"card-body"},O=s("h5",null,[s("i",{class:"fa fa-user"}),w(" Edit Siswa")],-1),F=s("hr",null,null,-1),T={class:"row"},I={class:"col-md-6"},J={class:"mb-4"},R=s("label",null,"Nisn",-1),q={key:0,class:"alert alert-danger mt-2"},z={class:"col-md-6"},G={class:"mb-4"},Q=s("label",null,"Nama Lengkap",-1),W={key:0,class:"alert alert-danger mt-2"},X={class:"row"},Y={class:"col-md-6"},Z={class:"mb-4"},$=s("label",null,"Kelas",-1),ss=["value"],os={key:0,class:"alert alert-danger mt-2"},ts={class:"col-md-6"},es={class:"mb-4"},ns=s("label",null,"Jenis Kelamin",-1),as=s("option",{value:"L"},"Laki - Laki",-1),ds=s("option",{value:"P"},"Perempuan",-1),rs=[as,ds],is={key:0,class:"alert alert-danger mt-2"},ls={class:"row"},cs={class:"col-md-6"},ms={class:"mb-4"},_s=s("label",null,"Password",-1),us={key:0,class:"alert alert-danger mt-2"},fs={class:"col-md-6"},hs={class:"mb-4"},bs=s("label",null,"Konfirmasi Password",-1),ws=s("button",{type:"submit",class:"btn btn-md btn-primary border-0 shadow me-2"},"Update",-1),vs=s("button",{type:"reset",class:"btn btn-md btn-warning border-0 shadow"},"Reset",-1);function ks(r,o,n,e,ps,ys){const v=_("Head"),k=_("Link");return a(),d(b,null,[u(v,null,{default:f(()=>[B]),_:1}),s("div",K,[s("div",C,[s("div",E,[u(k,{href:"/admin/students",class:"btn btn-md btn-primary border-0 shadow mb-3",type:"button"},{default:f(()=>[H,j]),_:1}),s("div",A,[s("div",D,[O,F,s("form",{onSubmit:o[6]||(o[6]=V((...t)=>e.submit&&e.submit(...t),["prevent"]))},[s("div",T,[s("div",I,[s("div",J,[R,i(s("input",{type:"text",class:"form-control",placeholder:"Masukkan Nisn Siswa","onUpdate:modelValue":o[0]||(o[0]=t=>e.form.nisn=t)},null,512),[[m,e.form.nisn]]),n.errors.nisn?(a(),d("div",q,l(n.errors.nisn),1)):c("",!0)])]),s("div",z,[s("div",G,[Q,i(s("input",{type:"text",class:"form-control",placeholder:"Masukkan Nama Siswa","onUpdate:modelValue":o[1]||(o[1]=t=>e.form.name=t)},null,512),[[m,e.form.name]]),n.errors.name?(a(),d("div",W,l(n.errors.name),1)):c("",!0)])])]),s("div",X,[s("div",Y,[s("div",Z,[$,i(s("select",{class:"form-select","onUpdate:modelValue":o[2]||(o[2]=t=>e.form.classroom_id=t)},[(a(!0),d(b,null,x(n.classrooms,(t,p)=>(a(),d("option",{key:p,value:t.id},l(t.title),9,ss))),128))],512),[[h,e.form.classroom_id]]),n.errors.classroom_id?(a(),d("div",os,l(n.errors.classroom_id),1)):c("",!0)])]),s("div",ts,[s("div",es,[ns,i(s("select",{class:"form-select","onUpdate:modelValue":o[3]||(o[3]=t=>e.form.gender=t)},rs,512),[[h,e.form.gender]]),n.errors.gender?(a(),d("div",is,l(n.errors.gender),1)):c("",!0)])])]),s("div",ls,[s("div",cs,[s("div",ms,[_s,i(s("input",{type:"password",class:"form-control",placeholder:"Masukkan Password","onUpdate:modelValue":o[4]||(o[4]=t=>e.form.password=t)},null,512),[[m,e.form.password]]),n.errors.password?(a(),d("div",us,l(n.errors.password),1)):c("",!0)])]),s("div",fs,[s("div",hs,[bs,i(s("input",{type:"password",class:"form-control",placeholder:"Masukkan Konfirmasi Password","onUpdate:modelValue":o[5]||(o[5]=t=>e.form.password_confirmation=t)},null,512),[[m,e.form.password_confirmation]])])])]),ws,vs],32)])])])])])],64)}const xs=M(P,[["render",ks]]);export{xs as default};
