<template>
  <div class="flex justify-center items-center">
    <div
      class="bg-white w-[70%] h-auto my-[5%] border border-gray-300 shadow-lg"
    >
      {{ form }}
      <template v-for="(item, index) in form" :key="index">
        <div class="p-10 grid grid-cols-[20%_60%_20%] gap-4">
          <div class="font-serif text-3xl">Item {{ index + 1 }}</div>
          <div class="flex gap-4">
            <input
              type="text"
              :id="'name_' + index"
              v-model="item.name"
              class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
              placeholder="Enter Name"
            />
            <input
              type="number"
              :id="'price_' + index"
              v-model="item.price"
              class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500"
              placeholder="Enter Price"
            />
          </div>
          <div class="flex gap-4">
            <button
              type="button"
              class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900"
              @click="addItem(item)"
            >
              +
            </button>
            <button
              type="button"
              class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
              @click="removeItem(index)"
            >
              -
            </button>
          </div>
        </div>
      </template>
      <div class="ml-[25%]">
        <button
          type="button"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900"
          @click="saveItem()"
        >
          Save
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive } from "vue";
import axios from "axios";
const form = reactive([
  {
    name: "",
    price: "",
  },
]);

const addItem = (item) => {
  form.push({ name: "", price: "" });
};

const removeItem = (index) => {
  if (form.length > 1) {
    form.splice(index, 1);
  }
};
const saveItem = () => { // Assuming you have some data in your form object
  axios.post('http://localhost:8000/api/test', form)
    .then(response => {
      console.log(response.data); // Assuming you want to log the response data
    })
    .catch(error => {
      console.log(error);
    });
};
</script>
