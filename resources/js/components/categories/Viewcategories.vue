<template>
  <div>
    <div v-if="isLoading">
      <h2>Loading ....</h2>
    </div>
    <div v-else class="py-6">
      <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
          <router-link :to="{ name: 'Addcategorie' }" class="btn btnoutline-light">
            <i class="fa-solid fa-square-plus"></i> New categorie
          </router-link>
        </div>
      </nav>
      <table class="table table-striped shadow">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Nom</th>
           
            <th scope="col">View</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="cat in categories" :key="cat.id">
            <td><img :src="cat.imagecategorie" width="70" height="80" /></td>
            <td>{{ cat.nomcategorie }}</td>
           
            <td>
              <button class="btn btn-outline-primary mx-2">
                <i class="fa-solid fa-pen-to-square"></i>
                Edit
              </button>
            </td>
            <td>
              <button class="btn btn-outline-danger mx-2" @click="deletecategorie(cat.id)">
                <i class="fa-solid fa-trash-can"></i>
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
const categories = ref([]);
const isLoading = ref(true);
const getcategories = async () => {
  await axios
    .get("http://localhost:8000/api/categories")
    .then((res) => {
      categories.value = res.data;
      isLoading.value = false;
    })
    .catch((error) => {
      console.log(error);
    });
};
onMounted(() => {
  getcategories();
});
const deletecategorie = async (id) => {
  if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
    try {
      await axios.delete(`http://localhost:8000/api/categories/${id}`);
      getcategories();
    } catch (error) {
      console.log(error);
    }
  }
};
</script>
<style lang="scss" scoped></style>
