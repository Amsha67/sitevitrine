# 💻 TechRépart — Site Vitrine Strasbourg

> Site vitrine professionnel pour **TechRépart**, technicien informatique indépendant basé à Strasbourg.  
> Réparation de PC, Mac, smartphones et tablettes — diagnostic rapide, devis transparent, intervention locale.

---

## 🌐 Aperçu

| Info | Détail |
|------|--------|
| 🏢 Client | TechRépart — Strasbourg |
| 👨‍💻 Développeur | Schmoelzlin Eric |
| 📅 Année | 2026 |
| 📄 Licence | Privé / Propriétaire |

---

## 📁 Structure du Projet

```
sitevitrine/
├── index.html          # Page principale (Accueil, Expertise, Tarifs, Contact)
├── mentions.html       # Mentions légales & politique de confidentialité
├── traitement.php      # Traitement sécurisé du formulaire de contact
└── assets/             # Images, CSS, JavaScript
    ├── css/            # Feuilles de style
    ├── js/             # Scripts JavaScript
    └── img/            # Visuels et icônes
```

---

## ✨ Fonctionnalités

- **Page d'accueil** — Présentation de TechRépart avec bannière et section diagnostic rapide
- **Expertise** — Détail des prestations : maintenance, micro-soudure, sécurité informatique
- **Tarification** — Forfaits smartphones, PC & Mac, diagnostic gratuit
- **Formulaire de contact sécurisé** — Anti-bot (honeypot + captcha arithmétique) + opt-in RGPD
- **Mentions légales** — Conformité légale complète

---

## 🛠️ Technologies

| Couche | Outils |
|--------|--------|
| Front-End | HTML5, CSS3 (Flexbox / Grid), JavaScript ES6 |
| Back-End | PHP 8+ |
| Hébergement | OVH / Infomaniak — HTTPS + SSL |

**Langages utilisés :** CSS 49.6% · HTML 48.4% · PHP 2.0%

---

## 🔒 Sécurité & RGPD

Le formulaire de contact implémente plusieurs couches de protection :

- ✅ **Honeypot** — champ invisible pour bloquer les bots
- ✅ **Captcha arithmétique** — question aléatoire côté serveur (ex : `6 + 9 = ?`)
- ✅ **Validation RegEx** — email et téléphone vérifiés côté client et serveur
- ✅ **Protection XSS** — `htmlspecialchars()` et `filter_var()` sur toutes les entrées
- ✅ **Aucun stockage** — les données sont envoyées directement par mail, non stockées
- ✅ **Opt-in RGPD** — consentement explicite requis avant envoi
- ✅ **Hébergement français** — souveraineté des données garantie

---

## 🚀 Installation & Déploiement

### Prérequis

- Serveur PHP 8+
- Hébergement avec HTTPS activé (OVH / Infomaniak recommandé)

### Étapes

```bash
# 1. Cloner le dépôt
git clone https://github.com/Amsha67/sitevitrine.git

# 2. Déposer les fichiers sur votre hébergement via FTP ou Git
# 3. Configurer traitement.php avec votre adresse email
# 4. Vérifier que le certificat SSL est actif
```

### Configuration du formulaire

Ouvrez `traitement.php` et renseignez votre adresse de réception :

```php
$destinataire = "votre@email.fr"; // ← Modifier ici
```

---

## 📖 Documentation Technique d'Utilisation

### 1. Modifier les contenus du site

Tout le contenu est dans **`index.html`**. Le fichier est organisé en sections identifiées par des balises `id` :

| Section | ID HTML | Contenu modifiable |
|---------|---------|-------------------|
| Accueil | `#accueil` | Titre, sous-titre, accroche |
| Expertise | `#expertise` | Textes des prestations, icônes |
| Tarification | `#tarifs` | Prix, intitulés des forfaits |
| Contact | `#contact` | Adresse, téléphone, email affiché |

```html

<!-- Exemple : modifier un tarif -->
<span class="prix">À partir de XX €</span>
```

---


> 💡 Pour changer une couleur sur tout le site, modifiez uniquement la variable correspondante.

---

### 2. Ajouter / modifier une prestation

Dans `index.html`, repérez la section `#expertise` et dupliquez un bloc existant :

```html
<div class="item"><strong>💻 Réparation PC & Mac</strong> : Écrans, batteries, sauvetage de données.
                    </div>
```

---

### 3. Mettre à jour les tarifs 

Dans la section `#tarifs`, chaque forfait suit cette structure :

```html
 <section class="grilletarif">
            <div class="carteprix">
                <div class="titrecarte">
                    <h3>Smartphone</h3>
                </div>
                <ul class="listeprix">
                    <li>Remplacement Écran ➡️Dès 59€</li>
                    <li>Changement de Batterie ➡️ 39€</li>
                    <li>Connecteur de charge ➡️ 45€</li>
                    <li>Récupération de données ➡️ Sur Devis</li>
                </ul>

            </div>
```

---

### 4. Configurer et tester le formulaire de contact

Le fichier **`traitement.php`** gère l'envoi des messages. Les paramètres à vérifier :

```php
// ─── À CONFIGURER ───────────────────────────────────────────
$destinataire = "contact@techrepart.fr";   // Email de réception
$sujet_prefix = "[TechRépart] ";           // Préfixe de l'objet du mail
// ────────────────────────────────────────────────────────────
```

**Tester le formulaire en local :**

```bash
# Démarrer un serveur PHP local
php -S localhost:8000

# Ouvrir dans le navigateur
http://localhost:8000/index.html
```

> ⚠️ L'envoi de mail nécessite un vrai serveur avec une configuration SMTP valide. En local, utilisez [Mailtrap](https://mailtrap.io) pour simuler la réception.

**Vérifier que l'anti-bot fonctionne :** soumettez le formulaire sans remplir la question captcha — le message doit être rejeté avec une erreur.

---

### 5. Mettre à jour les mentions légales

Ouvrez **`mentions.html`** et mettez à jour les informations suivantes si nécessaire :

- Nom / raison sociale du responsable de traitement
- Adresse postale
- Numéro SIRET
- Coordonnées de l'hébergeur

---

### 6. Déployer une mise à jour

```bash
# 1. Modifier les fichiers en local
# 2. Vérifier visuellement dans le navigateur
# 3. Pousser les modifications sur GitHub
git add .
git commit -m "Description de la modification"
git push origin main

# 4. Sur l'hébergement : tirer les dernières modifications
git pull origin main
# — ou déposer les fichiers modifiés via FTP
```

---

### 7. Checklist avant mise en ligne

- [ ] Adresse email configurée dans `traitement.php`
- [ ] Certificat SSL actif (HTTPS)
- [ ] Formulaire testé (envoi + captcha)
- [ ] Affichage vérifié sur mobile, tablette et desktop
- [ ] Mentions légales à jour (SIRET, hébergeur, responsable RGPD)
- [ ] Balises `<title>` et `<meta description>` renseignées dans `index.html`
- [ ] Images optimisées (poids < 200 Ko recommandé)

---

## 🎨 Charte Graphique

| Élément | Valeur |
|---------|--------|
| Couleur principale | `#003366` — Bleu nuit |
| Couleur accentuation | `#E88E00` — Orange |
| Couleur neutre | `#EEEEEE` — Gris clair |
| Police titres | Lato |
| Police corps | Open Sans |
| Design | Responsive Mobile-First |

---




👨‍💻 Développé par Schmoelzlin Eric

---

*© 2026 TechRépart — Tous droits réservés.*
