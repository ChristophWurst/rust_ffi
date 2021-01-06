# Rust FFI

Demonstrate the usage of Rust in a Nextcloud app

## How to test

* `cargo build`
* `php occ app:enable rust_ffi`
* `php occ rust-ffi:test`

Hint: only works if the php `ffi` extension is installed and enabled.

