<template>
  <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
    <h4 align="center">Ajout Catégorie</h4>
    <form @submit.prevent="addCategorie">
      <div class="row">
        <div class="col-md-6">
          .
          <label for="reference" class="form-label">Nom</label>
          <input
            type="text"
            class="form-control"
            id="nomcategorie"
            vmodel="categorie.nomcategorie"
          />
        </div>
       
      </div>
      
       
      <div class="row">
        <div class="col-md-12">
          .
          <label for="prix" class="form-label">Image</label>
          <input
            type="text"
            class="form-control"
            id="imagecategorie"
            vmodel="categorie.imagecategorie"
          />
        </div>
      </div>
      <br />
      <button type="submit" class="btn btn-outline-primary">
        <i class="fa-solid fa-floppy-disk"></i>Enregister
      </button>
      <router-link to="/listart" class="btn btn-outline-danger mx-2">
        <i class="fa-solid fa-xmark"></i>Cancel
      </router-link>
    </form>
  </div>
</template>
<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
import axios from "axios";
const categorie = ref({
  nomcategorie: "",
  imagecategorie: "",
});
const addCategorie = async () => {
  await axios
    .post("http://localhost:8000/api/categories/", categorie.value)
    .then(() => router.push({ name: "Viewcategories" }))
    .catch((err) => console.log(err));
};
</script>
<style scoped></style>
