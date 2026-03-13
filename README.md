# 💻 TechRépart — Site Vitrine Strasbourg

> Site vitrine professionnel pour **TechRépart**, technicien informatique indépendant basé à Strasbourg.  
> Réparation de PC, Mac, smartphones et tablettes — diagnostic rapide, devis transparent, intervention locale.

---

## 🌐 Aperçu

| Info | Détail |
|------|--------|
| 🏢 Client | TechRépart — Strasbourg |
| 👨‍💻 Développeur | Schmoelzlin Eric |
| 📅 Année | 2025 |
| 📄 Licence | Privé / Propriétaire |

---

## 📁 Structure du Projet

```
sitevitrine/
├── index.html          # Page principale (Accueil, Expertise, Tarifs, Contact)
├── mentions.html       # Mentions légales & politique de confidentialité
├── traitement.php      # Traitement sécurisé du formulaire de contact
└── assets/             # Images, CSS, JavaScript
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

*© 2025 TechRépart — Tous droits réservés.*
