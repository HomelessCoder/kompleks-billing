# AGENTS.md

## Purpose

- This project exposes legacy LanBilling concerns through modern PHP modules.
- Treat `share/billing_structure.sql` and `share/table_fields/**/*.md` as the source of truth for legacy schema and field semantics.
- Aim for the reasonable minimum needed to work with the billing system, not a full reimplementation of every legacy table or feature.
- Keep the system read-only unless the task explicitly changes that constraint.

## Architecture

- The codebase is a modular monolith built on the `power-modules` ecosystem: `framework`, `persistence`, and `console`.
- Each business capability lives in its own top-level module namespace under `src/` and exposes a `PowerModule` class as its composition root.
- Module dependencies should flow through explicit `imports()` and `exports()` contracts rather than ad hoc cross-module wiring.
- Shared technical wiring belongs in `Foundation`, which exposes common infrastructure such as the billing database alias and statement factories.
- The app boots through `ModularAppBuilder`, with module registration defined in `config/app_modules.php` and console setup in `bin/console`.

## Module Shape

- `Application/` contains use-case entry points, typically query objects and handlers.
- `Domain/` contains readonly models, enums, and repository contracts.
- `Infrastructure/` contains persistence concerns such as schema definitions, hydrators, and repository implementations.

## Design Patterns

- Use a module-as-composition-root style: register services inside the module, export only stable contracts, and keep wiring local.
- Favor a read-side CQRS shape for use cases: query object in application code, handler orchestrating a repository call, no domain mutation in the handler.
- Use the repository pattern at the domain boundary and keep storage-specific details in infrastructure.
- Use hydrators as data mappers between legacy database rows and typed domain objects.
- Keep legacy column names and table structure centralized in schema definitions instead of scattering raw SQL field names through the code.
- Prefer immutable `readonly` objects and enums to make legacy value mappings explicit and safe.

## Implementation Guidance

- Normalize legacy quirks at the infrastructure boundary, especially nullable fields, coded integers, and zero-date values.
- When vendor functionality is missing in the `power-modules` ecosystem, prefer extending the vendor package and consuming the released version through Composer rather than building local framework workarounds.
- Keep new code aligned with the existing module layout and the read-only system goal.