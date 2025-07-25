import globals from "globals";
import js from "@eslint/js";
import pluginReact from "eslint-plugin-react";
import pluginSecurity from "eslint-plugin-security";

/** @type {import("eslint").ConfigData[]} */
export default [
  {
    files: ["**/*.{js,mjs,cjs,jsx}"],
    languageOptions: {
      globals: globals.browser
    },
    plugins: {
      js,
      react: pluginReact,
      security: pluginSecurity
    },
    rules: {
      ...js.configs.recommended.rules,
      ...pluginReact.configs.flat.recommended.rules,
      "security/detect-eval-with-expression": "error",
      "security/detect-unsafe-regex": "warn",
      "security/detect-non-literal-fs-filename": "warn",
      "security/detect-non-literal-regexp": "warn",
      "security/detect-pseudoRandomBytes": "warn",
      "security/detect-child-process": "warn",

    }
  }
];
