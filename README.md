# momiji-core

WordPressの自作テーマ（開発用）です。
シンプルな構成をベースに、テーマ開発の土台として育てていくことを想定しています。

## 概要

`momiji-core` は、WordPressテーマ開発の学習・検証・拡張を目的としたシンプルなテーマです。
最低限のテンプレート構成（`header.php` / `footer.php` / `index.php` / `functions.php` / `style.css`）から始めて、必要に応じて機能を追加していく前提のベーステーマです。

## 特徴

- 最低限のテンプレート構成で始めやすい
- WordPressテーマ開発の学習用として扱いやすい
- 将来的な機能追加・テンプレート分割を前提にした土台構成
- ポートフォリオ公開や配布を見据えて育てていける

## 現在の構成

- `style.css`（テーマヘッダー / 最低限のスタイル）
- `functions.php`（CSS読み込み）
- `header.php`（共通ヘッダー）
- `footer.php`（共通フッター）
- `index.php`（メインテンプレート）
- `screenshot.png`（テーマ一覧用スクリーンショット）
- `package.json`（BrowserSync用）
- `package-lock.json`
- `.gitignore`

## 開発環境（想定）

- WordPress（Docker）
- MariaDB
- phpMyAdmin
- Node.js（BrowserSync）
- WSL2（Ubuntu）
- Git / GitHub

## テーマの目的

- 自作テーマ開発の学習
- テンプレート構造の理解
- WordPress Theme Check 対応の土台作り
- 将来的なポートフォリオ公開・配布に向けたベーステーマ化

## セットアップ（例）

### 1. テーマを配置

`wp-content/themes/` 配下に `momiji-core` を配置します。

### 2. テーマを有効化

WordPress管理画面の **外観 > テーマ** から `momiji-core` を有効化します。

### 3. 開発サーバー起動（任意）

BrowserSync を使う場合は、テーマディレクトリで以下を実行します。

```bash
npm install
npm run dev
```

## 注意点

- このテーマは **学習・検証目的のベーステーマ** です。現時点では最低限のテンプレートのみを含みます。
- 本番運用・配布前に、以下の観点を必ず確認してください。
  - **セキュリティ**：出力のエスケープ、フォーム処理（nonce / 権限チェック）、不要な情報の露出防止
  - **アクセシビリティ**：見出し構造、ランドマーク（header / main / footer）、キーボード操作、コントラスト
  - **SEO**：title / description、見出し構造、OGP/Twitterカード、構造化データ
  - **パフォーマンス**：CSS/JSの読み込み最適化、画像最適化、不要ファイルの削除
- 現在は `index.php` 中心の構成です。用途に応じてテンプレートを追加してください。
- BrowserSync / Node.js 関連は **開発補助用** であり、テーマ利用自体には必須ではありません。
- `WP_DEBUG` を有効化している場合、公開環境では無効化（または `WP_DEBUG_DISPLAY` を `false`）にしてください。

## 今後追加予定（例）

### テンプレートファイル

- `single.php`
- `page.php`
- `archive.php`
- `404.php`
- `search.php`
- `comments.php`
- `sidebar.php`

### テーマ機能

- `title-tag` / `post-thumbnails` / `html5` などのテーマサポート追加
- メニュー登録・ウィジェットエリア登録
- ナビゲーションメニュー対応
- アイキャッチ画像対応
- テーマカスタマイザー対応

### 設計・構成の改善

- CSS設計の整理（クラス命名ルール統一）
- テンプレートパーツ化（`template-parts`）

## ライセンス

GPL-2.0-or-later（WordPress テーマに準拠）

## Author

momiji
