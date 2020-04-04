import ApiService from "@services/api.service";

export const CarService = {
    random() {
        return ApiService.get("random_car");
    },
    get(slug) {

      return ApiService.get("cars", slug);
    },
    show(slug) {
        return ApiService.get("car", slug);
    },
    search(params) {

        return ApiService.post("cars", params);
    }
};
