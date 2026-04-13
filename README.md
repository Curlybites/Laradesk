# Laradesk

Laradesk is a **multi-tenant service desk system (SaaS)** designed for managing support tickets per city or organization. Each city or tenant can operate independently with its own users, roles, permissions, and ticketing system.

---

## 🚀 Features

### 🧑‍💼 Multi-Tenant System
- Separate workspace per city / organization
- Isolated users, roles, and tickets
- Scalable SaaS-ready architecture

### 🎫 Ticketing System
- Create, update, and track service requests
- Assign tickets to agents or departments
- Ticket status management (Open, In Progress, Resolved, Closed)
- Priority levels (Low, Medium, High, Critical)

### 👥 User & Role Management
- Role-based access control (RBAC)
- Permission system using Spatie Permission
- Admin, Agent, and User roles

### 📊 Dashboard
- Overview of ticket statistics
- Active vs resolved tickets
- User activity monitoring

### 🏙️ City-Based Segmentation
- Each city acts as a separate service desk instance
- City-specific admins and agents
- Data isolation per city

### 🔔 Notifications (Optional / Future)
- Email notifications for ticket updates
- Real-time updates (WebSockets / Broadcasting)

---

## 🏗️ Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Blade / TailAdmin UI
- **Permissions:** Spatie Laravel Permission
- **Database:** MySQL
- **Optional Frontend Upgrade:** Vue.js (future expansion)

---

## 📦 Installation

### 1. Clone repository
```bash
git clone https://github.com/yourusername/laradesk.git
cd laradesk