{{-- About About --}}
<div
  class="flex flex-col items-center gap-6 bg-gray-200 px-4 py-12 sm:gap-8 sm:px-6 md:px-8 lg:flex-row lg:gap-4 lg:px-20 lg:py-24">
  <div class="flex flex-1 flex-col gap-6 sm:gap-8 lg:gap-10">
    <p class="text-lg font-bold sm:text-xl">KNEAD TO KNOW</p>
    <p class="text-sm font-bold">
      We believe that great food starts with great ingredients. Every pastry, bread, and cake we create is crafted with
      love and the finest quality materials we can source. Our passion for baking shines through in every bite.
    </p>
    <p class="text-sm">
      From our hands to your table, we pour our heart into every recipe. Whether you're craving a buttery croissant, a
      crusty sourdough, or a sweet treat to brighten your day, we've got something that will make your taste buds dance
      with joy!
    </p>
  </div>
  <div class="flex flex-1 gap-2 sm:gap-3">
    <x-ui.image-card imageAsset="ingredients.jpg" aspect="3/4" class="w-1/2" />
    <x-ui.image-card imageAsset="bakery_products.jpg" aspect="3/4" class="w-1/2" />
  </div>
</div>

{{-- Vision Mission --}}
<div class="lg:py-30 px-4 py-16 sm:px-6 md:px-8 lg:px-20">
  <div class="flex flex-col items-center gap-8 lg:flex-row lg:gap-16">
    <div class="flex flex-1 gap-2 sm:gap-3">
      <x-ui.image-card imageAsset="store.jpg" aspect="square" class="w-1/2" />
      <x-ui.image-card imageAsset="flour_clap.jpg" aspect="square" class="w-1/2" />
    </div>
    <div class="flex flex-1 flex-col gap-4 sm:gap-6">
      <p class="text-lg font-bold sm:text-xl">VISI</p>
      <p class="text-sm">
        To be the heart of every morning and the warmth in every home across our community. We envision a world where
        freshly baked bread is not just food, but a daily ritual that brings people together. Through our craft, we aim
        to create moments of joy, comfort, and connection for generations to come. One loaf at a time.
      </p>
    </div>
  </div>

  <div class="lg:mt-30 mt-16 flex flex-col items-center gap-8 sm:mt-20 lg:flex-row lg:gap-16">
    <div class="flex flex-1 flex-col gap-4 sm:gap-6 lg:order-first">
      <p class="text-lg font-bold sm:text-xl">MISI</p>
      <p class="text-sm">
        We are committed to delivering the highest quality baked goods using time-honored techniques passed down through
        decades. Every day, we wake before dawn to ensure our bread is fresh and ready for our beloved customers. We
        strive to innovate while respecting tradition, using local ingredients whenever possible, and always putting our
        community first. Because at the end of the day, it's about the smiles we create and the memories we bake into
        every bite.
      </p>
    </div>
    <div class="flex flex-1 gap-2 sm:gap-3">
      <x-ui.image-card imageAsset="joy.jpg" aspect="2/1" />
    </div>
  </div>
</div>
