import ApiService from "@services/api.service";

export const InterestedService = {
    post(params) {
      return ApiService.post("interested", params);
    }
};
