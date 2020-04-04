import ApiService from "@services/api.service";

export const ContactService = {
    post(params) {
      return ApiService.post("contact", params);
    }
};
