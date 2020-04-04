<template>
  <div>
    <v-row>
      <v-col cols="12" sm="12" md="12" lg="12" class="text-center mt-10">
        <span class="black--text f-30 font-600">Asked Questions</span>
      </v-col>
      <!-- <v-card > -->
        <v-list max-width="auto" class="mx-auto" width="80%">
          <v-list-group
            v-for="item in items"
            :key="item.title"
            v-model="item.active"
            :prepend-icon="item.action"
            no-action
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title v-text="item.title"></v-list-item-title>
              </v-list-item-content>
            </template>

            <v-list-item v-for="subItem in item.items" :key="subItem.title">
              <v-list-item-content>
                <v-list-item-title v-text="subItem.title"></v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
        </v-list>
      <!-- </v-card> -->
    </v-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          action: "local_activity",
          title: "Attractions",
          items: [{ title: "List Item" }]
        },
        {
          action: "restaurant",
          title: "Dining",
          // active: true,
          items: [
            { title: "Breakfast & brunch" },
            { title: "New American" },
            { title: "Sushi" }
          ]
        },
        {
          action: "school",
          title: "Education",
          items: [{ title: "List Item" }]
        },
        {
          action: "directions_run",
          title: "Family",
          items: [{ title: "List Item" }]
        },
        {
          action: "healing",
          title: "Health",
          items: [{ title: "List Item" }]
        },
        {
          action: "content_cut",
          title: "Office",
          items: [{ title: "List Item" }]
        },
        {
          action: "local_offer",
          title: "Promotions",
          items: [{ title: "List Item" }]
        }
      ]
    };
  }
};
</script>
