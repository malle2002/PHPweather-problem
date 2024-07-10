import { createRouter, createWebHistory } from "vue-router";
import WeatherComponent from "@/components/WeatherComponent.vue";

const routes = [
  {
    path: "/weather",
    name: "Weather",
    component: WeatherComponent,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
