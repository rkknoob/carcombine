import ApiService from "@services/api.service";

export const WishlistService = {
    post(params) {
      return ApiService.post("wishlist", params);
    }
};
