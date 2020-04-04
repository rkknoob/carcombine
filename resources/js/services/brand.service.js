import ApiService from "@services/api.service";

export const BrandService = {
    get() {
      return ApiService.get("brands");
    },
    select() {
        return ApiService.get("brands_select");
    },
    model(slug) {
        return ApiService.get("brand_model", slug);
    },
    year(slug) {
        return ApiService.get("brand_year", slug);
    },
    gear(slug) {
        return ApiService.get("brand_gear", slug);
    }
};
