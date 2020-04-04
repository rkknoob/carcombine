import ApiService from "@services/api.service";

export const ColorService = {
    get() {
      return ApiService.get("color");
    }
};
