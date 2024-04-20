import Viewarticles from "./components/articles/Viewarticles.vue";
import Viewcategorie from "./components/categories/Viewcategories.vue";
import Addcategorie from "./components/categories/Addcategorie.vue";
import Addarticle from "./components/articles/Addarticle.vue";
import Editarticle from "./components/articles/Editarticle.vue";
import Viwearticletable from "./components/articles/Viwearticletable.vue"


import Accueil from "./components/accueil.vue";

export const routes = [
  {
    name: "Accueil",
    path: "/",
    component: Accueil
  },
  {
    name:"Viewarticletable",
    path:"/articletable",
    component:Viwearticletable
    },    
  {
    name: "Viewcategorie",
    path: "/listcat",
    component: Viewcategorie
  },
  {
    name: "Addcategorie",
    path: "/addcategorie",
    component: Addcategorie
  },
  {
    name: "Viewarticles",
    path: "/listart",
    component: Viewarticles
  },
  {
    name: "Addarticle",
    path: "/addarticle",
    component: Addarticle
  },
  {
    name: "editarticle",
    path: "/editarticle/:id",
    component: Editarticle
  }
];
