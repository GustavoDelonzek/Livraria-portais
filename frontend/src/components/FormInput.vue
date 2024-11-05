<template>
  <div class="relative z-0 w-full mb-5 group">
    <input
      :type="type"
      :name="name"
      class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-dark dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
      :placeholder="placeholder"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      required
    />
    <label
      class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
    >{{ label }}</label>
  </div>
</template>

<script>
export default {
  name: 'FormInput',
  props: {
    type: { type: String, default: 'text' },
    name: { type: String, required: true },
    label: { type: String, required: true },
    placeholder: { type: String, default: ' ' },
    modelValue: { type: [String, Number], required: true }
  },
  emits: ['update:modelValue']
}
</script>